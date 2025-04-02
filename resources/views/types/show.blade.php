@extends('layouts.posts')

@section("title","Dettagli dei Tipi:")
@section("content")
<h1>{{$type->name}}</h1>

<div class="d-flex py-4 gap-2">
    <a class="btn btn-outline-warning" href="{{ route("types.edit", $type) }}">Modifica</a>

    <!-- Bottone per aprire la modale -->
    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Elimina</button>
</div>

<!-- Modale di conferma -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Conferma Eliminazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler eliminare questo elemento?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route("types.destroy", $type) }}" method="post" class="d-inline">
                    @csrf
                    @method("DELETE")
                    <input type="submit" class="btn btn-danger" value="Conferma"></input>
                </form>
            </div>
        </div>
    </div>
</div>

<table>
    <tr>
        <th>ID</th>
        <td>{{$type->id}}</td>
    </tr>
    <tr>
        <th>Nome</th>
        <td>{{$type->name}}</td>
    </tr>
    <tr>
        <th>Descrizione</th>
        <td>{{$type->description}}</td>
    </tr>

</table>
<a href="{{route('types.index')}}" class="btn btn-outline-success my-4">Torna alla lista dei tipi</a>
@endsection
