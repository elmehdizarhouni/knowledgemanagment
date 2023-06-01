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
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($employe->formations as $formation)
          <tr>
            <td>{{ $formation->nom_formation }}</td>
            <td>{{ $formation->description_formation }}</td>
            <td>
            <button onclick="window.location.href='{{ route('formations.edit', ['employe' => $employe, 'formation' => $formation]) }}'" class="btn btn-secondary">Modifier</button>
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

      <button onclick="window.location.href='{{ route('formations.create', $employe) }}'" class="btn btn-primary">Ajouter</button>

    </div>
  </div>
</div>

  <div class="competenceContainer">
  <div class="cardBox">
    <div class="card">
      <h1>Compétences :</h1>

      <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employe->competences as $competence)
                <tr>
                    <td>{{ $competence->nom_competence }}</td>
                    <td>{{ $competence->type }}</td>
                    <td>
                        <a href="{{ route('competences.edit', ['employe' => $employe, 'competence' => $competence]) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('competences.destroy', ['employe' => $employe, 'competence' => $competence]) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette compétence ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

    <a href="{{ route('competences.create', $employe) }}" class="btn btn-primary">Ajouter une compétence</a>
@endsection
