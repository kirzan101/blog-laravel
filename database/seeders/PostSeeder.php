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
            [
                'description' => 'test_1',
                'teacher_id' => 1
            ],
            [
                'description' => 'test_2',
                'teacher_id' => 1
            ],
            [
                'description' => 'test_2',
                'teacher_id' => 1
            ]
        ];

        foreach ($array as $arr) {
            Post::create($arr);
        }
    }
}
