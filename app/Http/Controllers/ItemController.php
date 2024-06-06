<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Inventory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Items::with('itemStats', 'itemCategories', 'itemRarity')->get();
        return response()->json($items);
    }

    public function show($id)
    {
        $item = Items::with('itemStats', 'itemCategories', 'itemRarity')->find($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'item_stats' => 'required|numeric',
            'item_categories' => 'required|numeric',
            'item_rarity' => 'required|numeric',
            'image' => 'image'
        ]);

        $item = Items::find($id);
        $item->name = $validated['name'];
        $item->description = $validated['description'];
        $item->price = $validated['price'];
        $item->item_stats = $validated['item_stats'];
        $item->item_categories = $validated['item_categories'];
        $item->item_rarity = $validated['item_rarity'];
        if ($request->hasFile('image')) {
            $item->image = $validated['image']->store('images');
        }
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item updated successfully');
    }

    public function destroy($id)
    {
        $item = Items::find($id);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }

    public function buy(Request $request, $id, $qte, $currency)
    {
        $item = Items::find($id);
        $player = $request->session()->get('player');
        $inventory = Inventory::where('player_id', $player->player_id)->where('item_id', $id)->first();

        $money = $item->price * $qte;
        if ($currency == 'money') {
            $pMoney = $player->money;

            if ($pMoney < $money) {
                return response()->json(['error' => 'notEnoughMoney']);
            }
            $player->money = $pMoney - $money;
        } else {
            $pMoney = $player->gem;

            if ($pMoney < $money) {
                return response()->json(['error' => 'notEnoughGems']);
            }
            $player->gem = $pMoney - $money;
        }

        if ($inventory) {
            $inventory->quantity += $qte;
        } else {
            $inventory = new Inventory();
            $inventory->player_id = $player->player_id;
            $inventory->item_id = $id;
            $inventory->quantity = $qte;
        }
        $inventory->save();
        try {
            $player->save();
            $inventory->save();
            return response()->json(['success' => 'Achat effectué']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de l\'achat']);
        }
    }
}
