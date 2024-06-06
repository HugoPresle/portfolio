<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use App\Models\Type;
use App\Models\Rarity;
use App\Models\Items;
use App\Models\Inventory;
use App\Models\Team;
use App\Models\Captured;
use App\Models\Teams_Monster;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $monsters = Monster::with('monsterTypes.type', 'rarity')->get();
        $types = Type::all();
        $raritys = Rarity::all();
        $items = Items::with('itemStats', 'itemCategories', 'itemRarity')->get();

        $player = session('player');
        $inventory = Inventory::with('item')->where('player_id', $player->player_id)->get();
        $captured = Captured::with('monster')->where('player_id', $player->player_id)->get();

        $team = Team::with(['team_monster' => function ($query) {
            $query->orderBy('position', 'asc');
        }, 'team_monster.capture.monster.monsterTypes.type'])
            ->where('player_id', $player->player_id)
            ->where('principal', 1)
            ->first();


        return view('welcome', compact(
            'monsters',
            'types',
            'raritys',
            'items',
            'inventory',
            'captured',
            'team'
        ));
    }
}
