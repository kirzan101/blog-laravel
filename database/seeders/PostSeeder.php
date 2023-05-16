<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::create([
        //     'description' => 'test2'
        // ]);

        $array = [
            ['description' => 'test1 rest'],
            ['description' => 'test2 rest'],
            ['description' => 'test3 rest'],
        ];

        foreach ($array as $arr) {
            Post::create($arr);
        }
    }
}
