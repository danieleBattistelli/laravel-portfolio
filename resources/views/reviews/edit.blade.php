@extends('layouts.reviews')
@section('title', 'Modifica recensione')
@section('content')
    <form action="{{ route('reviews.update', $review) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nome Gioco --}}

        <div class="mb-3">
            <label for="gametitle" class="form-label">Nome Gioco</label>
            <input type="text" class="form-control" name="gametitle" id="gametitle" required
                value="{{ $review->gametitle }}">
        </div>

        {{-- Immagine --}}

        <div class="mb-3 w-25">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*"
                onchange="previewImage(event)">
        </div>

        {{-- Anteprima immagine caricata --}}

        <div class="mb-3">
            <img id="imagePreview" src="{{ $review->image ? asset('storage/' . $review->image) : '' }}"
                alt="Anteprima immagine" class="img-fluid"
                style="max-width: 200px; display: {{ $review->image ? 'block' : 'none' }};">
        </div>

        {{-- se esiste visualizzo l'immagine --}}

        @if ($review->image)
            <div class="d-flex justify-content-between align-items-center">
                <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->gametitle }}" class="img-fluid"
                    style="max-width: 200px;">
            </div>
        @endif

        {{-- Genere --}}

        <div class="mb-3 w-25">
            <label for="genre_id" class="form-label">Genere</label>
            <select class="form-select" name="genre_id" id="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $review->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Piattaforme --}}

        <div class="form-control mb-3 d-flex flex-wrap ">
            @foreach ($platforms as $platform)
                <div class="tag me-2">
                    <input type="checkbox" name="platforms[]" value="{{ $platform->id }}" id="platform-{{ $platform->id }}"
                        {{ $review->platforms->contains($platform->id) ? 'checked' : '' }}>
                    <label for="platform-{{ $platform->id }}">{{ $platform->name }}</label>
                </div>
            @endforeach
        </div>

        {{-- Titolo recensione --}}

        <div class="mb-3">
            <label for="reviewTitle" class="form-label">Titolo della recensione</label>
            <input type="text" class="form-control" name="reviewTitle" id="reviewTitle" required
                value="{{ $review->reviewTitle }}">
        </div>

        {{-- Recensione --}}

        <div class="mb-3">
            <label for="reviewBody" class="form-label">Recensione</label>
            <textarea class="form-control" name="reviewBody" id="reviewBody" rows="5" required>{{ $review->reviewBody }}</textarea>
        </div>

        {{-- Voto --}}

        <div class="mb-3 w-25">
            <label for="rating" class="form-label">Voto</label>
            <input type="text" class="form-control" name="rating" id="rating" required pattern="^\d+([.,]\d{1,2})?$"
                title="Inserisci un numero  da 1 a 10 con un numero dopo la virgola (es. 7.5)"
                value="{{ $review->rating }}">
        </div>

        {{-- Nome Recensore --}}

        <div class="mb-3 w-25">
            <label for="reviewerName" class="form-label">Nome Recensore</label>
            <input type="text" class="form-control" name="reviewerName" id="reviewerName" required
                value="{{ $review->reviewerName }}">
        </div>

        {{-- Data di pubblicazione --}}

        <div class="mb-3 w-25">
            <label for="reviewDate" class="form-label">Data della recensione</label>
            <input type="date" class="form-control" name="reviewDate" id="reviewDate" required
                value="{{ $review->reviewDate }}">
        </div>

        <button type="submit" class="btn btn-outline-primary">Modifica Recensione</button>
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
