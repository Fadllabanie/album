<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Album;
use App\Models\AlbumMedia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Album::factory()->count(20)->create()->each(function ($data) {
            AlbumMedia::factory($data)->count(4)->create([
                'album_id' => $data->id,
            ]);
        });
    }
}
