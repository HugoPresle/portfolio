<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Inventory;
use App\Models\Captured;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{

    public function create(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:Player|max:255',
            'password' => 'required|max:255'
        ]);

        $player = Player::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'avatar' => 1,
            'background' => 2,
            'title' => 1,
            'lvl' => 1,
            'xp' => 0,
            'xp_max' => 100,
            'money' => 100,
            'gem' => 100,
            'stamina' => 10,
            'stamina_max' => 10,
            'stamina_regen' => 1,
            'stamina_regentime' => 300000,
            'create_time' => now(),
            'last_login' => now()
        ]);

        Auth::login($player);
        $request->session()->put('player', $player);
        return redirect()->route('home')->with('success', 'Vous êtes connecté avec succès !');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $player = Player::where('username', $validated['username'])->first();
        $player->load('avatar', 'background', 'title');

        if ($player && Hash::check($validated['password'], $player->password)) {
            $player->last_login = now();
            $player->save();
            $request->session()->put('player', $player);

            return redirect()->route('home')->with('success', 'Vous êtes connecté avec succès !');
        } else {
            return redirect('/login')->with('fail', 'Mot de passe ou login incorrect !');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('player');
        return redirect('/login')->with('success', 'Vous êtes déconnecté !');
    }

    public function show($id)
    {
        $player = Player::find($id);
        return view('player.show', compact('player'));
    }

    public function upddate($id)
    {
        $player = Player::find($id);
        return view('player.update', compact('player'));
    }
    
    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return redirect()->route('Player.index')->with('success', 'Player deleted successfully!');
    }

    public function getCurrentUser(Request $request)
    {
        $player = $request->session()->get('player');
        return response()->json($player);
    }

    public function playerItems(Request $request)
    {
        $player = $request->session()->get('player');
        $inventory = Inventory::with('item.itemStats', 'item.itemCategories', 'item.itemRarity')->where('player_id', $player->player_id)->get();
        return response()->json($inventory);
    }

    public function playerMonsters(Request $request)
    {
        $player = $request->session()->get('player');
        $captured = Captured::with('monster')->where('player_id', $player->player_id)->get();
        return response()->json($captured);
    }

    public function playerTeams(Request $request)
    {
        $player = $request->session()->get('player');
        $teams = Team::with(['team_monster' => function ($query) {
            $query->orderBy('position', 'asc');
        }, 'team_monster.capture.monster.monsterTypes.type'])
            ->where('player_id', $player->player_id)
            ->get();
        return response()->json($teams);
    }
}
