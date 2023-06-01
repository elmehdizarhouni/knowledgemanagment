@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle évaluation</h1>

    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf

        <!-- Champs du formulaire -->
        <div class="form-group">
            <label for="id_employe">Employé</label>
            <select class="form-control" name="id_employe">
                <!-- Options pour la sélection de l'employé -->
            </select>
        </div>

        <!-- Autres champs du formulaire -->

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
