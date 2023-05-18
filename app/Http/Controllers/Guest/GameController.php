<?php

namespace App\Http\Controllers\Guest;

use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index (){

        $games = Game::all();

        return view('guest.games.index', compact('games'));
    }
}
