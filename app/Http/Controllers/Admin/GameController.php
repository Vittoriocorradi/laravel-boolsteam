<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Publisher;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();


    //index riceve array comics
    return view('games.index', compact('games'));
    }        


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publisher::all();
        return view('games.create', compact('publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {

        $data =$request->all();

        $newGame = new Game();

        if(isset($data['image'])){ 
            
            $path_img = Storage::put('uploads', $data['image']);
            //$path_img = Storage::disk('public')->put('uploads', $data['image']);
            
            $newGame->image = $path_img;
        }

        $newGame->fill($data);
        $newGame->save();

        return to_route('admin.games.show', $newGame->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {

        return view('games.show', compact('game'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $publishers = Publisher::all();
        return view('games.edit', compact('game','publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameRequest  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $request->validated();

        $data = $request->all();
        
        if (isset($data['image'])) {
            if ($game->image) {
                Storage::delete($game->image);
            }

            $game->image = Storage::put('uploads', $data['image']);
        } else if (empty($data['image'])) {
            if ($game->image) {
                Storage::delete($game->image);
                $game->image = null;
            }
        }

        $game->update($data);

        return to_route('admin.games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return to_route('admin.games.index');
    }
}
