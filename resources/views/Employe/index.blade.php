@extends('layouts.app')

@section('content')
    <h1>Liste des employés</h1>

    <a href="{{ route('employes.create') }}" class="btn btn-primary">Ajouter un employé</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Date d'embauche</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employes as $employe)
                <tr>
                    <td>{{ $employe->nom }}</td>
                    <td>{{ $employe->prenom }}</td>
                    <td>{{ $employe->adresse }}</td>
                    <td>{{ $employe->email }}</td>
                    <td>{{ $employe->telephone }}</td>
                    <td>{{ $employe->date_embauche }}</td>
                    <td>
                        <a href="{{ route('employes.show', $employe->id) }}" class="btn btn-primary">Afficher</a>
                        <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('employes.destroy', $employe->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
