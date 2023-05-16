<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all record
        $posts = Post::all(); //select * from posts;

        // return $posts;
        return PostResource::collection($posts); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {

        // $request->validate([
        //     'description' => 'required|max:255',
        // ]);

        // create record`
        $post = Post::create([
            'description' => $request->description,
        ]);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // return $post;
        return new PostResource($post); //for 1 only
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $post = Post::find($id);

            $post = tap($post)->update([
                'description' => $request->description,
            ]);

            return new PostResource($post);
        } catch (\Exception $e) {
            return ['error' => 'has error - '.$e];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete record
    }
}
