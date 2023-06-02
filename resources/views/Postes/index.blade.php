@extends('layouts.app')

@section('content')
    <h1>Liste des postes</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postes as $poste)
                <tr>
                    <td>{{ $poste->nom_poste }}</td>
                    <td>{{ $poste->description_poste }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
