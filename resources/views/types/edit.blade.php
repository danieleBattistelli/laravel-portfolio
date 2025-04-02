@extends ("layouts.posts")
@section("title",'Modifica il Tipo:')
@section("content")
<form action="{{ route('types.update', $type) }}" method="POST">
    {{-- Il metodo POST è usato per inviare dati al server --}}
    {{-- Il route posts.store è il percorso per la creazione di un nuovo post --}}
    {{-- Il token CSRF è necessario per proteggere il tuo form da attacchi CSRF --}}
    @csrf

    @method('PUT')
    {{-- Il metodo PUT è usato per aggiornare i dati esistenti --}}
    {{-- Il route posts.update è il percorso per l'aggiornamento di un post esistente --}}
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" id="name" required value="{{ $type->name }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" name="description" id="description" rows="5" required>{{ $type->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Modifica Tipo</button>
</form>
@endsection
