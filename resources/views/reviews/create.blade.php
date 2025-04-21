@extends('layouts.reviews')
@section('title', 'Crea una nuova recensione')
@section('content')
    <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">

        {{-- Il metodo POST è usato per inviare dati al server --}}

        {{-- Il route reviews.store è il percorso per la creazione di un nuovo progetto --}}

        {{-- Il token CSRF è necessario per proteggere il tuo form da attacchi CSRF --}}

        @csrf

        {{-- Nome Gioco --}}

        <div class="mb-3">
            <label for="gametitle" class="form-label">Nome Gioco</label>
            <input type="text" class="form-control" name="gametitle" id="gametitle" required>
        </div>

        {{-- Immagine --}}

        <div class="mb-3 w-25">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*"
                onchange="previewImage(event)">
        </div>

        {{-- Anteprima immagine caricata --}}

        <div class="mb-3">
            <img id="imagePreview" src="" alt="Anteprima immagine" class="img-fluid"
                style="max-width: 200px; display: none;">
        </div>

        {{-- Genere --}}

        <div class="mb-3 w-25">
            <label for="genre_id" class="form-label">Genere</label>
            <select class="form-select" name="genre_id" id="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Piattaforme --}}

        <div class="form-control mb-3 d-flex flex-wrap ">
            @foreach ($platforms as $platform)
                <div class="tag me-2">
                    <input type="checkbox" name="platforms[]" value="{{ $platform->id }}" id="platform-{{ $platform->id }}">
                    <label for="platform-{{ $platform->id }}">{{ $platform->name }}</label>
                </div>
            @endforeach
        </div>

        {{-- Titolo recensione --}}

        <div class="mb-3">
            <label for="reviewTitle" class="form-label">Titolo della recensione</label>
            <input type="text" class="form-control" name="reviewTitle" id="reviewTitle" required>
        </div>

        {{-- Recensione --}}

        <div class="mb-3">
            <label for="reviewBody" class="form-label">Recensione</label>
            <textarea class="form-control" name="reviewBody" id="reviewBody" rows="5" required></textarea>
        </div>

        {{-- Voto --}}

        <div class="mb-3 w-25">
            <label for="rating" class="form-label">Voto</label>
            <input type="text" class="form-control" name="rating" id="rating" required pattern="^\d+([.,]\d{1,2})?$"
                title="Inserisci un numero  da 1 a 10 con un numero dopo la virgola (es. 7.5)" placeholder="Es. 7.5">
        </div>

        {{-- Nome Recensore --}}

        <div class="mb-3 w-25">
            <label for="reviewerName" class="form-label">Nome Recensore</label>
            <input type="text" class="form-control" name="reviewerName" id="reviewerName" required>
        </div>

        {{-- Data di pubblicazione --}}

        <div class="mb-3 w-25">
            <label for="reviewDate" class="form-label">Data della recensione</label>
            <input type="date" class="form-control" name="reviewDate" id="reviewDate" required>
        </div>

        <button type="submit" class="btn btn-outline-primary">Crea Recensione</button>
    </form>

    {{-- Script per anteprima immagine --}}

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
            }
        }
    </script>
@endsection
