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
            $table->integer("player1Id");
            $table->integer("player2Id");
            $table->boolean("isActive")->default(true);
            $table->integer("winnerId")->default(0);
            $table->integer('currentMatch')->default(0);
            $table->string('player1Choice')->default("none");
            $table->string('player2Choice')->default("none");

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
