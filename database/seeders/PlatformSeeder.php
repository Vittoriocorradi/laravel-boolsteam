<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = ['windows', 'apple', 'steam'];

        Schema::disableForeignKeyConstraints();
        Platform::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($platforms as $platform) {

            $newPlatform = new Platform();

            $newPlatform->name = $platform;
            $newPlatform->slug = Str::slug($newPlatform->name);

            $newPlatform->save();
        }
    }
}
