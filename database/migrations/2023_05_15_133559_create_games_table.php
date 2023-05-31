<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('image')->nullable();
            $table->text('description');
            $table->string('price', 10);
            $table->float('discount', 3, 2)->nullable();
            $table->string('genre');
            $table->string('developer', 70);
            $table->date('release_date');
            $table->float('score', 3,1)->nullable();
            $table->string('original_language', 20);
            $table->text('available_language');
            $table->boolean('released')->default(true);
            $table->boolean('highlighted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
