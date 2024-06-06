<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\RarityController;
use App\Http\Controllers\TypeController;

Route::get('/', function () {
    return redirect('/portfolio');
})->name('home');

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [PlayerController::class, 'create']);

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [PlayerController::class, 'login']);
Route::get('/logout', [PlayerController::class, 'logout']);

Route::get('/portfolio', function () {
    return view('portfolio/portfolio');
});


/* Route API */

//User
Route::get('/api/getCurrentUser', [PlayerController::class, 'getCurrentUser']);
Route::get('/api/getPlayerItems', [PlayerController::class, 'playerItems']);
Route::get('/api/getPlayerMonsters', [PlayerController::class, 'playerMonsters']);
Route::get('/api/getPlayerTeams', [PlayerController::class, 'playerTeams']);
//Items
Route::get('/api/getAllItems', [ItemController::class, 'index']);
Route::get('/api/getItemById/{id}', [ItemController::class, 'show']);
Route::post('/api/buyItem/{id}/{qte}/{devise}', [ItemController::class, 'buy']);
//Monsters
Route::get('/api/getAllMonsters', [MonsterController::class, 'index']);
Route::get('/api/getMonsterById/{id}', [MonsterController::class, 'show']);
//Types
Route::get('/api/getAllTypes', [TypeController::class, 'index']);
Route::get('/api/getTypeById/{id}', [TypeController::class, 'show']);
//Rarity
Route::get('/api/getAllRarity', [RarityController::class, 'index']);
Route::get('/api/getRarityById/{id}', [RarityController::class, 'show']);