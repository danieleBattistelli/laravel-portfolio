@extends('layouts.posts')

@section("title","Tutti i progetti:");

@section("content")
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cliente</th>
            <th>Descrizione</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{$project->name}}</td>
            <td>{{$project->client}}</td>
            <td>{{$project->description}}</td>
            <td><a href="{{ route("projects.show", $project)}}">Visualizza</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
