@extends ("layouts.posts")
@section("title",'Crea nuovo Tipo:')
@section("content")
<form action="{{ route('types.store') }}" method="POST">
    {{-- Il metodo POST è usato per inviare dati al server --}}
    {{-- Il route posts.store è il percorso per la creazione di un nuovo post --}}
    {{-- Il token CSRF è necessario per proteggere il tuo form da attacchi CSRF --}}
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" name="description" id="description" rows="5" required>

        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
