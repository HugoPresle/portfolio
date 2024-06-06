<?php

namespace App\Http\Controllers;

use App\Models\Rarity;
use Illuminate\Http\Request;

class RarityController extends Controller
{
    public function index()
    {
        $rarities = Rarity::all();
        return response()->json($rarities);
    }

    public function show($id)
    {
        $rarity = Rarity::find($id);
        return response()->json($rarity);
    }
}
