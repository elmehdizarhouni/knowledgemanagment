@extends('layouts.app')

@section('content')
    <h1>Liste des évaluateurs</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse Email</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluateur as $eval)
                <tr>
                    <td>{{ $eval->nom_evaluateur}}</td>
                    <td>{{ $eval->prenom_evaluateur}}</td>
                    <td>{{ $eval->email_evaluateur  }}</td>
                
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
