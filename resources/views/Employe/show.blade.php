@extends('layouts.app')

@section('content')
    <h1>Détails de l'employé</h1>
    <h2>Informations personnelles</h2>
    <p>Nom : {{ $employe->nom }}</p>
    <p>Prénom : {{ $employe->prenom }}</p>
    <p>Adresse : {{ $employe->adresse }}</p>
    <p>Email : {{ $employe->email }}</p>
    <p>Téléphone : {{ $employe->telephone }}</p>
    <p>Date d'embauche : {{ $employe->date_embauche }}</p>
    <p>Poste : {{ $employe->poste->nom_poste }}</p>
    <h2>Formations</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employe->formations as $formation)
                <tr>
                    <td>{{ $formation->nom_formation }}</td>
                    <td>{{ $formation->description_formation }}</td>
                    <td>
                        <a href="{{ route('formations.edit', ['employe' => $employe, 'formation' => $formation]) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('formations.destroy', ['employe' => $employe, 'formation' => $formation]) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('formations.create', $employe) }}" class="btn btn-primary">Ajouter une formation</a>

    <h2>Compétences</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Type</th>
                <th>Note</th>
                <th>Commentaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employe->competences as $competence)
                <tr>
                    <td>{{ $competence->nom_competence }}</td>
                    <td>{{ $competence->type }}</td>
                    <td>
                        @foreach ($evaluations as $evaluation)
                            @if ($evaluation->competence_id == $competence->id)
                                {{ $evaluation->note }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($evaluations as $evaluation)
                            @if ($evaluation->competence_id == $competence->id)
                                {{ $evaluation->commentaire }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if ($user && $user->hasRole('Evaluateur'))
                            @foreach ($evaluations as $evaluation)
                                @if ($evaluation->competence_id == $competence->id)
                                    <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-primary">Modifier</a>
                                    <a href="{{ route('evaluations.delete', $evaluation->id) }}" class="btn btn-primary">Supprimer</a>
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
            <td> @if ($user && $user->hasRole('Evaluateur'))
        <a href="{{ route('evaluations.create', ['employe' => $employe]) }}" class="btn btn-primary">Ajouter</a>
    @endif
</td>
           
        </tbody>
    </table>

@endsection
