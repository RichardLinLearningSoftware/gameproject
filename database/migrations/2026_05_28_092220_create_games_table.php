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
            $table->integer("matchId");
            $table->integer("player1Id");
            $table->integer("player2Id");
            $table->integer("player1HP");
            $table->integer("player2HP");
            $table->integer("round");
            $table->boolean("isActive");
            $table->integer("winnerId");
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
