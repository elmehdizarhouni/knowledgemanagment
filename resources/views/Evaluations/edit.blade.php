@extends('layouts.app')

@section('content')
    <h1>Modifier l'évaluation</h1>

    <form action="{{ route('evaluations.update', $evaluation) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Champs du formulaire pré-remplis avec les valeurs de l'évaluation -->
        <div class="form-group">
            <label for="id_employe">Employé</label>
            <select class="form-control" name="id_employe">
                <!-- Options pour la sélection de l'employé avec la valeur de l'évaluation pré-sélectionnée -->
            </select>
        </div>

        <!-- Autres champs du formulaire pré-remplis avec les valeurs de l'évaluation -->

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
