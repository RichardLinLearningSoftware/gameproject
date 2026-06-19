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
            'isActive' => true
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
        $users = User::all();
        $game = Game::find($id);
        return view ("pages.match", compact("game", "users"));
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
        $request->validate([
            'choice' => 'required|string|max:255',
        ]);

        $game = Game::find($id);
        $choice1 = $game->player1Choice;
        $choice2 = $game->player2Choice;

        if(auth()->id() == $game->player1Id){
            Game::findOrFail($id)->update([
                'player1Choice' => $request->choice,
            ]);
        }else{
            Game::findOrFail($id)->update([
                'player2Choice' => $request->choice,
            ]);
        }

        $game = Game::find($id);
        $choice1 = $game->player1Choice;
        $choice2 = $game->player2Choice;
        $player1 = User::find($game->player1Id);
        $player2 = User::find($game->player2Id);

        if($choice1 != "none" && $choice2 != "none"){
            if($choice1 == $choice2){
                Game::findOrFail($id)->update([
                    'winner' => "Tie",
                ]);
            }elseif($choice1 == "rock" && $choice2 == "scicors"){
                Game::findOrFail($id)->update([
                    'winner' => $player1->name,
                ]);
            }elseif($choice1 == "rock" && $choice2 == "paper"){
                Game::findOrFail($id)->update([
                    'winner' => $player2->name,
                ]);
            }elseif($choice1 == "scicors" && $choice2 == "paper"){
                Game::findOrFail($id)->update([
                    'winner' => $player1->name,
                ]);
            }elseif($choice1 == "scicors" && $choice2 == "rock"){
                Game::findOrFail($id)->update([
                    'winner' => $player2->name,
                ]);
            }elseif($choice1 == "paper" && $choice2 == "rock"){
                Game::findOrFail($id)->update([
                    'winner' => $player1->name,
                ]);
            }elseif($choice1 == "paper" && $choice2 == "scicors"){
                Game::findOrFail($id)->update([
                    'winner' => $player2->name,
                ]);
            }

            Game::findOrFail($id)->update([
                'isActive' => false
            ]);
            User::findOrFail($game->player1Id)->update([
                'currentMatch' => 0,
            ]);
            User::findOrFail($game->player2Id)->update([
                'currentMatch' => 0,
            ]);
        }
        return redirect("/game/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}

