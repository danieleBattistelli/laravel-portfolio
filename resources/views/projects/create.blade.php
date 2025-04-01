@extends('layouts.posts')

@section("title","Crea un nuovo progetto")
@section("content")
<form action="{{ route('projects.store') }}" method="POST">
    {{-- Il metodo POST è usato per inviare dati al server --}}
    {{-- Il route projects.store è il percorso per la creazione di un nuovo progetto --}}
    {{-- Il token CSRF è necessario per proteggere il tuo form da attacchi CSRF --}}
    @csrf
    <div>
        <label for="name">Nome Progetto</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="client">Cliente</label>
        <input type="text" name="client" id="client" required>
    </div>
    <div>
        <label for="start_date">Data di inizio</label>
        <input type="date" name="start_date" id="start_date" required>
    </div>
    <div>
        <label for="end_date">Data di fine</label>
        <input type="date" name="end_date" id="end_date" required></input>
    </div>
    <div>
        <label for="description">Descrizione</label></label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <button type="submit">Crea Progetto</button>
</form>
@endsection

