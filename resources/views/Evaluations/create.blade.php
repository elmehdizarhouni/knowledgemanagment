@extends('layouts.app')

@section('content')
    <h1>Ajouter une évaluation</h1>

    <form action="{{ route('evaluations.store', ['employe' => $employe, 'competence' => $competence]) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="note">Note :</label>
            <input type="text" name="note" id="note" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" id="commentaire" class="form-control" required></textarea>
        </div>
        

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
