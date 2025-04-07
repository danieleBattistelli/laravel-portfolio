@extends ("layouts.posts")
@section('title', 'Crea un nuovo Post')
@section('content')

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        {{-- aggiungo enctype per caricare file --}}
        {{-- aggiungo il token csrf per la protezione --}}
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control" name="author" id="author" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-control mb-3 d-flex flex-wrap">
            @foreach ($tags as $tag)
                <div class="tag me-2">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                    <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        {{--aggiungo input per caricare un immagine --}}

        <div class="mb-3">
            <label for="image" class="form-label" >Immagine</label>
            {{-- l'attributo accept limita i file che possono essere caricati --}}
            {{-- l'attributo required rende il campo obbligatorio --}}
            <input type="file" class="form-control" name="image" id="image" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" name="content" id="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Crea Post</button>
    </form>
@endsection
