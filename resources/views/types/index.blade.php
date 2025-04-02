@extends('layouts.posts')

@section("title","Tutti i progetti:");

@section("content")

<a href="{{ route('types.create') }}" class="btn btn-outline-primary my-4">
Aggiungi Tipo</a>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrizione</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
        <tr>
            <td>{{$type->name}}</td>
            <td>{{$type->description}}</td>
            <td>
                <a href="{{ route("types.show", $type)}}" class="btn btn-outline-success">
                    Visualizza
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
