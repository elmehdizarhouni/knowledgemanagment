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
    <h2>Compétences :</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Type</th>
                @if (Auth::user()->hasRole('Evaluateur'))
                    <th>Note</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($employe->competences as $competence)
                <tr>
                    <td>{{ $competence->nom_competence }}</td>
                    <td>{{ $competence->type }}</td>
                    @if (Auth::user()->hasRole('Evaluateur'))
                    @if ($competence->evaluations)
                        @foreach ($competence->evaluations as $evaluation)
                            <td>{{ $evaluation->note }}</td>
                            <td>{{ $evaluation->commentaire }}</td>
                            <td>
                                <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-secondary">Modifier</a>
                                <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette évaluation ?')">Supprimer</button>
                                </form>
                            </td>
                        @endforeach
                        @endif
                        <td>
                            <a href="{{ route('evaluations.create', $competence->id) }}" class="btn btn-primary">Ajouter une évaluation</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <button onclick="window.location.href='{{ route('competences.create', $employe) }}'" class="btn btn-primary">Ajouter</button>


    @if (Auth::user()->hasRole('Employé'))
        <a href="{{ route('evaluations.index') }}" class="btn btn-primary">Voir mes évaluations</a>
    @endif
@endsection