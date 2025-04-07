@extends('layouts.posts')

@section('title', 'Dettagli del Post:')
@section('content')

    {{--Sezione visualizzazione immagine --}}
    @if ($post->image)
        <div class="d-flex justify-content-between align-items-center">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid"
                style="max-width: 200px;">
        </div>
    @endif

    <hr>
    <h1>{{ $post->title }}</h1>

    <div class="d-flex py-4 gap-2">
        <a class="btn btn-outline-warning" href="{{ route('posts.edit', $post) }}">Modifica</a>

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
                    <form action="{{ route('posts.destroy', $post) }}" method="post" class="d-inline">
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
            <th>Autore</th>
            <td>{{ $post->author }}</td>
        </tr>

        <tr>
            <th>Categoria</th>
            <td>{{ $post->category->name }}</td>
        </tr>

        <tr>
            <th>Tags</th>
            <td>
                @forelse($post->tags as $tag)
                    <span class="badge" style="background-color: {{ $tag->color }}">{{ $tag->name }}</span>
                @empty
                    Nessuno
                @endforelse
            </td>
        </tr>

        <tr>
            <th>Contenuto</th>
            <td>{{ $post->content }}</td>
        </tr>


    </table>
    <a href="{{ route('posts.index') }}" class="btn btn-outline-success my-4">Torna alla lista dei post</a>
@endsection
