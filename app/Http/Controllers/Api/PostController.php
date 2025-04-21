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
        $posts = Post::with('category')->get();
        return response()->json(
            [
                'success' => 'true',
                'data' => $posts
            ],
        );
    }

    public function show(Post $post)
    {
        $post->load('category', 'tags');
        return response()->json(
            [
                'success' => 'true',
                'data' => $post
            ],
        );
    }
}
