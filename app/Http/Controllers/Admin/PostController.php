<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        //dd($posts);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->author = $data['author'];
        $newPost->category = $data['category'];
        $newPost->content = $data['content'];

        $newPost->save();

        return redirect()->route('posts.show', $newPost);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //$post = Post::find($post->id);
        // se si passa come argomento della funzione un'istanza di un modello,=> Post $post
        // invece di string id, Laravel cerca automaticamente il record corrispondente
        // nella tabella del database corrispondente al modello e lo passa alla funzione.
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        //Modifichiamo le informazioni contenute nel post:
            $post->title = $data['title'];
            $post->author= $data['author'];
            $post->category= $data['category'];
            $post->content= $data['content'];

            $post->update();

            return redirect()->route("posts.show", $post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("posts.index");
    }
}
