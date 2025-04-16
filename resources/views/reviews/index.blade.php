@extends('layouts.reviews')

@section('title', 'Lista delle recensioni:');

@section('content')

    <a href="{{ route('reviews.create') }}" class="btn btn-outline-primary my-4">
        Aggiungi Recensione</a>

    <table>
        <thead>
            <tr>
                <th>Titolo del Gioco</th>
                <th>Genere</th>
                <th>Titolo della recensione</th>
                <th>Voto</th>
                <th>Recensore</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->gametitle }}</td>
                    <td>{{ $review->genre->name }}</td>
                    <td>{{ $review->reviewTitle }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->reviewerName }}</td>
                    <td>
                        <a href="{{ route('reviews.show', $review) }}" class="btn btn-outline-success">
                            Visualizza
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
