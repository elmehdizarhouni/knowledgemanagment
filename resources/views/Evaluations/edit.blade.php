@extends('layouts.app')

@section('content')
    <h1>Modifier l'évaluation</h1>

    <form action="{{ route('evaluations.update', ['employe' => $employe, 'competence' => $competence, 'evaluation' => $evaluation]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="note">Note :</label>
            <input type="text" name="note" id="note" class="form-control" value="{{ $evaluation->note }}" required>
        </div>

        <div class="form-group">
            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" id="commentaire" class="form-control" required>{{ $evaluation->commentaire }}</textarea>
        </div>
       

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection

