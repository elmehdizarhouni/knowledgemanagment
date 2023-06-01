@extends('layouts.app')

@section('content')
    <h1>Détails de l'évaluation</h1>

    <p>ID : {{ $evaluation->id }}</p>
    <p>Employé : {{ $evaluation->employe->nom }}</p>
    <p>Date d'évaluation : {{ $evaluation->date_evaluation }}</p>
    <p>Note : {{ $evaluation->note }}</p>
    <p>Commentaire : {{ $evaluation->commentaire }}</p>
    <p>Évaluateur : {{ $evaluation->evaluateur->nom }}</p>
    <!-- Ajoutez ici d'autres informations spécifiques à l'évaluation -->

    <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-primary">Modifier</a>
@endsection
