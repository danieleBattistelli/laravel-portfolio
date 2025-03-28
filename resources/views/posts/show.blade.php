@extends('layouts.posts')

@section("title","Dettagli del Post:")
@section("content")
<h1>{{$post->title}}</h1>
<table>
    <tr>
        <th>ID</th>
        <td>{{$post->id}}</td>
    </tr>
    <tr>
        <th>Contenuto</th>
        <td>{{$post->content}}</td>
    </tr>
    <tr>
        <th>Autore</th>
        <td>{{$post->author}}</td>
    </tr>
    <tr>
        <th>Categoria</th>
        <td>{{$post->category}}</td>
    </tr>
</table>
<a href="{{route('posts.index')}}">Torna alla lista dei post</a>
@endsection
