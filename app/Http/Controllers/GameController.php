<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view ('pages.game', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'player2Id' => 'required|exists:users,id',
        ]);
        $game = Game::create([
            'player1Id' => auth()->id(),
            'player2Id' => $request->player2Id,
            'round' => 1,
            'isActive' => true,
            'winnerId' => 0,
        ]);

        User::findOrFail(auth()->id())->update([
            'currentMatch' => $game->id,
        ]);
        User::findOrFail($request->player2Id)->update([
            'currentMatch' => $game->id,
        ]);

        return redirect("/game/{$game->id}");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $game = Game::find($id);
        return view ("pages.match", compact("game"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}

