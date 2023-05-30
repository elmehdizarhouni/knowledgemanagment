@extends('layouts.app')

@section('content')
    <h1>Ajouter un employé</h1>

    <form action="{{ route('Employe.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control">
        </div>

        <div class="form-group">
            <label for="date_embauche">Date d'embauche</label>
            <input type="date" name="date_embauche" id="date_embauche" class="form-control">
        </div>

        <div class="form-group">
            <label for="id_poste">Poste</label>
            <select name="id_poste" id="id_poste" class="form-control">
                <option value="">Sélectionner un poste</option>
                @foreach ($postes as $poste)
                    <option value="{{ $poste->id }}">{{ $poste->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
