<?php

namespace Database\Seeders;

use App\Models\Publisher;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 15 ; $i++){

            $newGame = new Game();

            $publisher= Publisher::inRandomOrder()->first();
            $newGame->title = $faker->sentence();
            $newGame->image = $faker->imageUrl();
            $newGame->description = $faker->paragraph();
            $newGame->price = $faker->randomFloat(2, 0, 100);
            $newGame->developer = $faker->company();
            $newGame->release_Date = $faker->date();
            $newGame->score = $faker->numberBetween(0, 10);
            $newGame->original_language = $faker->languageCode();
            $newGame->available_language = $faker->languageCode();
            $newGame->publisher_id = $publisher->id;
            $newGame->released = $faker->boolean();
    
            $newGame->save();
        }
    }
}