<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run()
    {
        // Data Game Contoh (Sesuaikan dengan supply PS Plus Anda)
        $games = [
            ['title' => 'EA Sports FC 25', 'platform' => 'PS5', 'is_featured' => true],
            ['title' => 'Grand Theft Auto V', 'platform' => 'PS5', 'is_featured' => true],
            ['title' => 'God of War Ragnarok', 'platform' => 'PS5', 'is_featured' => true],
            ['title' => 'Marvel Spider-Man 2', 'platform' => 'PS5', 'is_featured' => true],
            ['title' => 'Ghost of Tsushima', 'platform' => 'PS4', 'is_featured' => true],
            ['title' => 'Elden Ring', 'platform' => 'PS5', 'is_featured' => true],
            ['title' => 'Tekken 8', 'platform' => 'PS5', 'is_featured' => true],
            ['title' => 'Resident Evil 4 Remake', 'platform' => 'PS5', 'is_featured' => true],
        ];

        foreach ($games as $game) {
            Game::create([
                'title' => $game['title'],
                'platform' => $game['platform'],
                'genre' => 'Action/Sports',
                'cover_image' => 'covers/placeholder.jpg', // Placeholder sementara
                'is_featured' => $game['is_featured'],
            ]);
        }
    }
}