<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers = ['EaSport', 'Activision','BattleState','Nintendo', 'Konami','SEGA'];

        Schema::disableForeignKeyConstraints();
        Publisher::truncate();
        Schema::enableForeignKeyConstraints();
        foreach ($publishers as $publisher) {

            $newPublisher = new Publisher();
            $newPublisher->company = $publisher;
            $newPublisher->slug = Str::slug($newPublisher->company);
            $newPublisher->save();

        }
    }
}
