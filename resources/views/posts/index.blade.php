@extends('layouts.posts')

@section("title","Tutti i post:")

@section("content")

<a href="{{ route('posts.create') }}" class="btn btn-outline-primary my-4">
    Aggiungi Post</a>

<table>

    <thead>
        <tr>
            <th>Titolo</th>
            <th>Autore</th>
            <th>Categoria</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>{{$post->category->name}}</td>
            <td>
                <a href="{{ route("posts.show", $post)}}" class="btn btn-outline-success">
                    Visualizza
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
