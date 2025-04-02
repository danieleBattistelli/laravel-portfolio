@extends ("layouts.posts")
@section("title",'Modifica il Progetto:')
@section("content")
<form action="{{ route('projects.update', $project) }}" method="POST">
    {{-- Il metodo POST è usato per inviare dati al server --}}
    {{-- Il route projects.store è il percorso per la creazione di un nuovo post --}}
    {{-- Il token CSRF è necessario per proteggere il tuo form da attacchi CSRF --}}
    @csrf

    @method('PUT')
    {{-- Il metodo PUT è usato per aggiornare i dati esistenti --}}
    {{-- Il route posts.update è il percorso per l'aggiornamento di un post esistente --}}


    <div class="mb-3">
        <label for="name" class="form-label">Nome Progetto</label>
        <input type="text" class="form-control" name="name" id="name" required value="{{ $project->name }}">
    </div>
    <div>
        <label for="type" class="form-label">Tipo</label>
        <select name="type_id" id="type_id">
            @foreach ($types  as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="client" class="form-label">Cliente</label>
        <input type="text" class="form-control" name="client" id="client" required value="{{ $project->client }}">
    </div>

    <div class="mb-3">
        <label for="start_date" class="form-label">Data Inizio</label>
        <input type="date" class="form-control" name="start_date" id="start_date" required value="{{ $project->start_date }}">
    </div>
    <div class="mb-3">
        <label for="end_date" class="form-label">Data Fine</label>
        <input type="date" class="form-control" name="end_date" id="end_date" required value="{{ $project->end_date }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" name="description" id="description" rows="5" required>{{ $project->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Modifica Progetto</button>
</form>
@endsection
