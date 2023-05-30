@extends('layouts.app')

@section('content')
    <h1>Créer une compétence</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('employes.competences.store', $employe) }}">
        @csrf

        <div class="form-group">
            <label for="nom_competence">Nom de la compétence</label>
            <input type="text" name="nom_competence" id="nom_competence" class="form-control">
        </div>

        <div class="form-group">
            <label for="type">Type de compétence</label>
            <select name="type" id="type" class="form-control">
                <option value="hard skills">Hard Skills</option>
                <option value="soft skills">Soft Skills</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
