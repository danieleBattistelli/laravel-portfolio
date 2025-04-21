<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'content' => 'required|string',
        ]);

        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->author = $data['author'];
        $newPost->category_id = $data['category_id'];
        $newPost->content = $data['content'];

        if (array_key_exists('image', $data)) {
            $img_url = Storage::putFile('posts', $data['image']);
            $newPost->image = $img_url;
        }

        $newPost->save();

        if ($request->has('tags')) {
            $newPost->tags()->attach($data['tags']);
        }

        return redirect()->route('posts.show', $newPost);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $post->title = $data['title'];
        $post->author = $data['author'];
        $post->category_id = $data['category_id'];
        $post->content = $data['content'];

        if (array_key_exists('image', $data)) {
            if (!is_null($post->image)) {
                Storage::delete($post->image);
            }
            $img_url = Storage::putFile('posts', $data['image']);
            $post->image = $img_url;
        }

        $post->update();

        if ($request->has('tags')) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        if ($post->image) {
            Storage::delete($post->image);
        }
        $post->delete();
        return redirect()->route("posts.index");
    }
}
