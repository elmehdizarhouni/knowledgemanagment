@extends('layouts.app')

@section('content')
    <h1>Modifier l'employé</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('Employe.update', $employe) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $employe->nom }}">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $employe->prenom }}">
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $employe->adresse }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $employe->email }}">
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $employe->telephone }}">
        </div>

        <div class="form-group">
            <label for="date_embauche">Date d'embauche</label>
            <input type="date" name="date_embauche" id="date_embauche" class="form-control" value="{{ $employe->date_embauche }}">
        </div>

        <div class="form-group">
            <label for="id_poste">Poste</label>
            <select name="id_poste" id="id_poste" class="form-control">
                <option value="">Sélectionner un poste</option>
                @foreach($postes as $poste)
                    <option value="{{ $poste->id }}" {{ $poste->id === $employe->id_poste ? 'selected' : '' }}>
                        {{ $poste->nom_poste }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
