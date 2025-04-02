@extends ("layouts.posts")
@section("title",'Modifica il Post:')
@section("content")
<form action="{{ route('posts.update', $post) }}" method="POST">
    {{-- Il metodo POST è usato per inviare dati al server --}}
    {{-- Il route posts.store è il percorso per la creazione di un nuovo post --}}
    {{-- Il token CSRF è necessario per proteggere il tuo form da attacchi CSRF --}}
    @csrf

    @method('PUT')
    {{-- Il metodo PUT è usato per aggiornare i dati esistenti --}}
    {{-- Il route posts.update è il percorso per l'aggiornamento di un post esistente --}}
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
            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : ''}}>
                {{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenuto</label>
        <textarea class="form-control" name="content" id="content" rows="5" required>{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Modifica Post</button>
</form>
@endsection
