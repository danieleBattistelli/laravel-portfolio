<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        //prendo tutte le recensioni dal database con genere e piattaforma e ne richiedo 3 per pagina
        $reviews = Review::with('genre', 'platforms')->paginate(3);
        //dd($reviews);
        return response()->json([
            'success' => 'true',
            'data' => $reviews
        ]);
    }

    public function show(Review $review)
    {
        //prendo la recensione dal database
        $review->load('genre', 'platforms');
        //dd($review);
        return response()->json([
            'success' => 'true',
            'data' => $review
        ]);
    }
}
