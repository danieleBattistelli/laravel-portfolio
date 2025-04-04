<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        //prendo tutti i post dal database
        $posts = Post::with('category')->get();
        //dd($posts);
        return response()->json(
            [
                'success' => 'true',
                'data' => $posts
            ],
        );
    }

    public function show(Post $post)
    {
        //prendo il post dal database
        $post->load('category', 'tags');
        //dd($post);
        return response() -> json(
            [
                'success' => 'true',
                'data' => $post
            ],
        );
    }
}
