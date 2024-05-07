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
        Schema::create('game_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('num_goals');
            $table->unsignedInteger('num_yellow_cards');
            $table->unsignedInteger('num_red_cards');
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('team_id');
            $table->timestamps();
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_results');
    }
};
