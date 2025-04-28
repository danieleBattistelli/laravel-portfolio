@extends('layouts.reviews')

@section('title', '')

@section('content')

    <!--visualizzazione immagine -->
    @if ($review->image && file_exists(public_path('storage/' . $review->image)))
        <div class="d-flex justify-content-between align-items-center">
            <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->gametitle }}" class="img-fluid"
                style="max-width: 200px;">
        </div>
    @else
        <p>Immagine non disponibile</p>
    @endif

    <h1>{{ $review->gametitle }}</h1>



    <div class="d-flex py-4 gap-2">
        <a class="btn btn-outline-warning" href="{{ route('reviews.edit', $review) }}">Modifica</a>

        <!-- Bottone per aprire la modale -->
        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Elimina</button>
    </div>

    <!-- Modale di conferma -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Conferma Eliminazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare la recensione?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('reviews.destroy', $review) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Conferma"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table>

        <tr>
            <th>Genere</th>
            <td>{{ $review->genre->name }}</td>
        </tr>
        <tr>
        <tr>
            <th>Piattaforme</th>
            <td>
                @forelse($review->platforms as $platform)
                    <span class="badge" style="background-color: {{ $platform->color }}">{{ $platform->name }}</span>
                @empty
                    Nessuno
                @endforelse
            </td>
        </tr>
        <tr>
            <th>Titolo Recensione</th>
            <td>{{ $review->reviewTitle }}</td>
        </tr>
        <tr>
            <th>Recensione</th>
            <td>{{ $review->reviewBody }}</td>
        </tr>
        <th>Recensore</th>
        <td>{{ $review->reviewerName }}</td>
        </tr>
        <tr>
            <th>Voto</th>
            <td>{{ $review->rating }}</td>
        </tr>
        <tr>
            <th>Data Di Pubblicazione</th>
            <td>{{ $review->created_at }}</td>
        </tr>

    </table>
    <a href="{{ route('reviews.index') }}" class="btn btn-outline-success my-4">Torna alla lista delle recensioni</a>
@endsection
