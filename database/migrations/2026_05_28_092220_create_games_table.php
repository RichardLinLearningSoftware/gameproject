<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->interger("matchId");
            $table->interger("player1Id");
            $table->interger("player2Id");
            $table->interger("player1HP");
            $table->interger("player2HP");
            $table->interger("round");
            $table->boolean("isActive");
            $table->boolean("isActive");
            $table->interger("winnerId");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
