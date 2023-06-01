@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle évaluation</h1>

    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf

        <!-- Champ Employé -->
        <div class="form-group">
            <label for="id_employe">Employé</label>
            <select class="form-control" name="id_employe">
                @foreach ($employes as $employe)
                    <option value="{{ $employe->id }}">{{ $employe->nom }}</option>
                @endforeach
            </select>
        </div>

        <!-- Champ Poste -->
        <div class="form-group">
            <label for="id_poste">Poste</label>
            <select class="form-control" name="id_poste">
                @foreach ($postes as $poste)
                    <option value="{{ $poste->id }}">{{ $poste->nom }}</option>
                @endforeach
            </select>
        </div>

        <!-- Champ Compétence -->
        <div class="form-group">
            <label for="id_competence">Compétence</label>
            <select class="form-control" name="id_competence">
                @foreach ($competences as $competence)
                    <option value="{{ $competence->id }}">{{ $competence->nom_competence }}</option>
                @endforeach
            </select>
        </div>

        <!-- Champ Date d'évaluation -->
        <div class="form-group">
            <label for="date_evaluation">Date d'évaluation</label>
            <input type="date" class="form-control" name="date_evaluation">
        </div>

        <!-- Champ Note -->
        <div class="form-group">
            <label for="note">Note</label>
            <input type="number" class="form-control" name="note">
        </div>

        <!-- Champ Commentaire -->
        <div class="form-group">
            <label for="commentaire">Commentaire</label>
            <textarea class="form-control" name="commentaire" rows="4"></textarea>
        </div>

        <!-- Champ Évaluateur -->
        <div class="form-group">
            <label for="id_evaluateur">Évaluateur</label>
            <select class="form-control" name="id_evaluateur">
                @foreach ($evaluateurs as $evaluateur)
                    <option value="{{ $evaluateur->id }}">{{ $evaluateur->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
