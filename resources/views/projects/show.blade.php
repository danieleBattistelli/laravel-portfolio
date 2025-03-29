@extends('layouts.posts')

@section("title","Dettaglio del Progetto:")
@section("content")
<h1>{{$project->title}}</h1>
<table>
    <tr>
        <th>ID</th>
        <td>{{$project->id}}</td>
    </tr>
    <tr>
        <th>Nome</th>
        <td>{{$project->name}}</td>
    </tr>
    <tr>
        <th>Cliente</th>
        <td>{{$project->client}}</td>
    </tr>
    <tr>
        <th>Data Di Inizio</th>
        <td>{{$project->start_date}}</td>
    </tr>
    <tr>
        <th>Data Di Fine</th>
        <td>{{$project->end_date}}</td>
    </tr>
    <tr>
        <th>Descrizione</th>
        <td>{{$project->description}}</td>
    </tr>
</table>
<a href="{{route('projects.index')}}">Torna alla lista dei progetti</a>
@endsection
