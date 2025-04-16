@extends ("layouts.posts")
@section('title', 'Modifica il Post:')
@section('content')
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        {{-- Il metodo POST è usato per inviare dati al server --}}
        {{-- Il route posts.store è il percorso per la creazione di un nuovo post --}}
        {{-- Il token CSRF è necessario per proteggere il tuo form da attacchi CSRF --}}
        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" required value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control" name="author" id="author" required value="{{ $post->author }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- Tags --}}
        <div class="form-control mb-3 d-flex flex-wrap">
            @foreach ($tags as $tag)
                <div class="tag me-2">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}"
                        {{ $post->tags->contains($tag->id) ? 'checked' : '' }}>
                    <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        {{-- aggiungo input per caricare un immagine --}}

        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            {{-- l'attributo accept limita i file che possono essere caricati --}}
            {{-- l'attributo required rende il campo obbligatorio --}}
            <input type="file" class="form-control" name="image" id="image" accept="image/*">
        </div>
        {{-- se esiste visualizzo l'immagine --}}
        @if ($post->image)
            <div class="d-flex justify-content-between align-items-center">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid"
                    style="max-width: 200px;">
            </div>
        @endif

        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" name="content" id="content" rows="5" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifica Post</button>
    </form>
@endsection
