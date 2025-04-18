<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // public function __construct()
    // {
    //     // Cambia 'auth:api' con 'auth:sanctum' se stai usando Laravel Sanctum
    //     $this->middleware('auth:sanctum');
    // }

    public function index(Request $request)
    {
        //prendo tutte le recensioni dal database con genere e piattaforma e ne richiedo 3 per pagina
        $query = Review::with('genre', 'platforms');

        // Aggiungo la funzionalità di ricerca
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('gametitle', 'like', '%' . $search . '%')

                ->orWhereHas('genre', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('platforms', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
        }

        // Aggiungo i filtri per genere e piattaforma
        if ($request->has('genre')) {
            $genre = $request->input('genre');
            $query->whereHas('genre', function ($q) use ($genre) {
                $q->where('name', 'like', '%' . $genre . '%');
            });
        }

        if ($request->has('platform')) {
            $platform = $request->input('platform');
            $query->whereHas('platforms', function ($q) use ($platform) {
                $q->where('name', 'like', '%' . $platform . '%');
            });
        }

        // Ordino per reviewDate dal più recente al meno recente
        $query->orderBy('reviewDate', 'desc');

        $reviews = $query->paginate(3);

        return response()->json(
            [
                'success' => 'true',
                'data' => $reviews
            ],
        );
    }

    public function show(Review $review)
    {
        //prendo la recensione dal database
        $review->load('genre', 'platforms');
        //dd($review);
        return response()->json(
            [
                'success' => 'true',
                'data' => $review
            ],
        );
    }
}
