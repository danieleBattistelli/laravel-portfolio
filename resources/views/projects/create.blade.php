@extends('layouts.posts')
@section("title","Crea un nuovo progetto")
@section("content")
<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
    {{-- Il metodo POST è usato per inviare dati al server --}}
    {{-- Il route projects.store è il percorso per la creazione di un nuovo progetto --}}
    {{-- Il token CSRF è necessario per proteggere il tuo form da attacchi CSRF --}}
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nome Progetto</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Tipo</label>
        <select class="form-select" name="type_id" id="type_id">
            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    {{--Tecnologie --}}
    <div class="form-control mb-3 d-flex flex-wrap">
        @foreach ($technologies as $technology)
            <div class="tag me-2">
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="tag-{{ $technology->id }}">
                <label for="tag-{{ $technology->id }}">{{ $technology->name }}</label>
            </div>
        @endforeach
    </div>
    
{{-- Immagine --}}
    <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input type="file" class="form-control" name="image" id="image" accept="image/*">
    </div>


    <div class="mb-3">
        <label for="client" class="form-label">Cliente</label>
        <input type="text" class="form-control" name="client" id="client" required>
    </div>
    <div class="mb-3">
        <label for="start_date" class="form-label">Data di inizio</label>
        <input type="date" class="form-control" name="start_date" id="start_date" required>
    </div>
    <div class="mb-3">
        <label for="end_date" class="form-label">Data di fine</label>
        <input type="date" class="form-control" name="end_date" id="end_date" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">Crea Progetto</button>
</form>
@endsection
