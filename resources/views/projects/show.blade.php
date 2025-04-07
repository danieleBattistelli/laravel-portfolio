@extends('layouts.posts')

@section('title', 'Dettaglio del Progetto:')
@section('content')

    @if ($project->image)
        <div class="d-flex justify-content-between align-items-center">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid"
                style="max-width: 200px;">
        </div>
    @endif

    <h1>{{ $project->title }}</h1>



    <div class="d-flex py-4 gap-2">
        <a class="btn btn-outline-warning" href="{{ route('projects.edit', $project) }}">Modifica</a>

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
                    Sei sicuro di voler eliminare questo post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('projects.destroy', $project) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Conferma"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $project->id }}</td>
        </tr>
        <tr>
            <th>Nome</th>
            <td>{{ $project->name }}</td>
        </tr>
        <tr>
            <th>Tipo progetto</th>
            <td>{{ $project->type->name }}</td>
        </tr>
        <tr>
        <tr>
            <th>Tecnologie</th>
            <td>
                @forelse($project->technologies as $technology)
                    <span class="badge" style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
                @empty
                    Nessuno
                @endforelse
            </td>
        </tr>
        <th>Cliente</th>
        <td>{{ $project->client }}</td>
        </tr>
        <tr>
            <th>Data Di Inizio</th>
            <td>{{ $project->start_date }}</td>
        </tr>
        <tr>
            <th>Data Di Fine</th>
            <td>{{ $project->end_date }}</td>
        </tr>
        <tr>
            <th>Descrizione</th>
            <td>{{ $project->description }}</td>
        </tr>
    </table>
    <a href="{{ route('projects.index') }}" class="btn btn-outline-success my-4">Torna alla lista dei progetti</a>
@endsection
