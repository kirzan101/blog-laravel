<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //get the all posts record
        $posts = Post::all();

        foreach($posts as $post)
        {
            Comment::create([
                'description' => sprintf('%s - %s', 'comment', $post->description),
                'post_id' => $post->getKey()
            ]);
        }
    }
}
