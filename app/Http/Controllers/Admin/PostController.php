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
        //prendo le categorie
        $categories = Category::all();

        //prendo i tag
        $tags = Tag::all();

        //dd($categories);

        return view('posts.create', compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //dd($data);

        // Validazione dei dati
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'content' => 'required|string',
        ]);

        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->author = $data['author'];
        $newPost->category_id = $data['category_id']; // Deve essere un ID numerico valido
        $newPost->content = $data['content'];

        // Se l'utente ha caricato un'immagine, salvala
        if (array_key_exists('image', $data)) {
            $img_url = Storage::putFile('posts', $data['image']);
            $newPost->image = $img_url; // Salva il percorso dell'immagine nel database

        } else {
            $newPost->image = null; // Se non viene caricata un'immagine, imposta il campo a null
        }
        // Salva il post nel database
        //dd($newPost);

        $newPost->save();

        //Dopo aver salvato il post

        //controllo se ricevo dei tags
        if ($request->has('tags')) {
            //li salvo nella tabella ponte
            $newPost->tags()->attach($data['tags']);
        }


        return redirect()->route('posts.show', $newPost);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //dd($post->tags);
        //dd($post->category);
        //$post = Post::find($post->id);
        // se si passa come argomento della funzione un'istanza di un modello,=> Post $post
        // invece di string id, Laravel cerca automaticamente il record corrispondente
        // nella tabella del database corrispondente al modello e lo passa alla funzione.

        //dd($post->tags);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //prendo le categorie
        $categories = Category::all();

        //prendo i tag
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        //dd($data);
        //Modifichiamo le informazioni contenute nel post:
        $post->title = $data['title'];
        $post->author = $data['author'];
        $post->category_id = $data['category_id'];
        $post->content = $data['content'];

        $post->update();

        //verifichiamo se stiamo ricevendo i tags
        if ($request->has('tags')) {

            //Sincronizziamo i tags della tabella Pivot
            $post->tags()->sync($data['tags']);
        } else {
            //se non riceviamo i tags li eliminiamo tutti quelli collegati al post dalla tabella pivot
            $post->tags()->detach();
        }

        return redirect()->route("posts.show", $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Rimuovi i collegamenti nella tabella pivot (tags)
        $post->tags()->detach();

        $post->delete();

        return redirect()->route("posts.index");
    }
}
