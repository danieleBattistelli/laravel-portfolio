@extends('layouts.posts')

@section("title","Tutti i progetti:");

@section("content")
<table>
    <thead>
        <tr>
            <th>Nome Progetto</th>
            <th>Cliente</th>
            <th>Data di inizio</th>
            <th>Data di fine</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{$project->name}}</td>
            <td>{{$project->client}}</td>
            <td>{{$project->start_date}}</td>
            <td>{{$project->end_date}}</td> 
            <td><a href="{{ route("projects.show", $project)}}">Visualizza</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
