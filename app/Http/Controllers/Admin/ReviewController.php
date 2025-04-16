<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //prendo i  generi
        $genres = Genre::all();

        //prendo le piattaforme
        $platforms = Platform::all();
        return view(
            'reviews.create',
            compact("genres", "platforms")
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $newReview = new Review();
        $newReview->gametitle = $data['gametitle'];
        $newReview->genre_id = $data['genre_id'];
        $newReview->reviewTitle = $data['reviewTitle'];
        $newReview->reviewBody = $data['reviewBody'];
        $newReview->rating = $data['rating'];
        $newReview->reviewerName = $data['reviewerName'];
        $newReview->reviewDate = $data['reviewDate'];
        $newReview->lastUpdated = $data['reviewDate'];


        if (array_key_exists('image', $data)) {
            $img_url = Storage::disk('public')->put('reviews', $data['image']);
            $newReview->image = $img_url;
        }

        $newReview->save();

        //Dopo aver salvato la recensione  controllo se ricevo le piattaforme
        if ($request->has('platforms')) {
            //li salvo nella tabella ponte
            $newReview->platforms()->attach($data['platforms']);
        }

        return redirect()->route(
            'reviews.show',
            $newReview->id
        )->with('message', 'Recensione creata con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {

        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //prendo i  generi
        $genres = Genre::all();

        //prendo le piattaforme
        $platforms = Platform::all();
        return view(
            'reviews.edit',
            compact("review", "genres", "platforms")
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $data = $request->all();
        //dd($data);
        $review->gametitle = $data['gametitle'];
        $review->genre_id = $data['genre_id'];
        $review->reviewTitle = $data['reviewTitle'];
        $review->reviewBody = $data['reviewBody'];
        $review->rating = $data['rating'];
        $review->reviewerName = $data['reviewerName'];
        $review->reviewDate = $data['reviewDate'];
        $review->lastUpdated = $data['reviewDate'];

        // Se l'utente ha caricato un'immagine,
        if (array_key_exists('image', $data)) {

            // Se esiste già un'immagine, la eliminiamo
            if (!is_null($review->image)) {
                Storage::delete($review->image);
            }
            // Salva la nuova immagine
            $img_url = Storage::putFile('reviews', $data['image']);
            // Aggiorna il db
            //dd($img_url);
            $review->image = $img_url;
        }

        $review->update();

        //Dopo il salvataggio verifichiamo se stiamo ricevendo le [iattaforme]
        if ($request->has('platforms')) {

            //Sincronizziamo i dati nella tabella Pivot
            $review->platforms()->sync($data['platforms']);
        } else {
            //se non li riceviamo  eliminiamo tutti quelli collegati
            $review->platforms()->detach();
        }

        return redirect()->route(
            'reviews.show',
            $review
        )->with('message', 'Recensione aggiornata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //elimino l'immagine
        if (!is_null($review->image)) {
            Storage::delete($review->image);
        }
        //elimino le piattaforme
        $review->platforms()->detach();
        //elimino la recensione
        $review->delete();
        return redirect()->route('reviews.index')
            ->with('message', 'Recensione eliminata con successo');
    }
}
