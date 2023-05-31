<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index() {

        $games = Game::with('genres', 'platforms')->paginate(6);
        return response()->json([
            'success' => true,
            'results' => $games
        ]);
    }

    public function highlight() {

        $game = Game::with('genres')->where('highlighted', true)->first();
        return response()->json([
            'success' => true,
            'results' => $game
        ]);
        
    }

    public function discount() {
        $discounted = Game::orderByDesc('discount')->orderByDesc('price')->paginate(3);
        return response()->json([
            'success' => true,
            'results' => $discounted
        ]);
    }
}
