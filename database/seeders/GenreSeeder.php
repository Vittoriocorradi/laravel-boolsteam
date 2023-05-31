<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['Multigiocatore', 'Sparatutto in prima persona', 'Zombi', 'Sparatutto', 'Azione', 'Prima persona', 'Giocatore singolo', 'Co-op', 'Futuristici', 'Illuminati', 'Eroe sparatutto', 'Robot', 'Fantascienza', 'Competitivi', 'Strategia', 'Simulazione', 'GDR', 'Medievali', 'Strategia su vasta scala', 'Mondo aperto', 'Avventura', 'Sandbox', 'Corse', 'Guida', 'Simulatori di veicoli', 'GDR multigiocatore di massa', 'Free-to-Play', 'GDR d\'azione', 'Hack & Slash', 'Spazio', '4X'];

        Schema::disableForeignKeyConstraints();
        Genre::truncate();
        Schema::enableForeignKeyConstraints();


        foreach ($genres as $genre) {

            $newGenre = new Genre();

            $newGenre->name = $genre;
            $newGenre->slug = Str::slug($newGenre->name);

            $newGenre->save();

        }
    }
}
