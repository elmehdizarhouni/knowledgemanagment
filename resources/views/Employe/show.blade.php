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
            @if (Auth::user()->hasRole('Employé'))
            <th>Actions</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($employe->formations as $formation)
          <tr>
            <td>{{ $formation->nom_formation }}</td>
            <td>{{ $formation->description_formation }}</td>
            @if (Auth::user()->hasRole('Employé'))
            <td>
            <button onclick="window.location.href='{{ route('formations.edit', ['employe' => $employe->id, 'formation' => $formation->id]) }}'" class="btn btn-secondary">Modifier</button>

              <form action="{{ route('formations.destroy', ['employe' => $employe, 'formation' => $formation]) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">Supprimer</button>
              </form>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
      @if (Auth::user()->hasRole('Employé'))
      <button onclick="window.location.href='{{ route('formations.create', $employe) }}'" class="btn btn-primary">Ajouter</button>
@endif
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
                <th>Evaluateur</th>
                <th>Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($employe->competences as $competence)
            <tr>
                <td>{{ $competence->nom_competence }}</td>
                <td>{{ $competence->type }}</td>
                @if (Auth::user()->hasRole('Employé'))
                    <td>
                        <button onclick="window.location.href='{{ route('competences.edit', ['employe' => $employe->id, 'competence' => $competence->id]) }}'" class="btn btn-secondary">Modifier</button>
                        <form action="{{ route('competences.destroy', ['employe' => $employe, 'competence' => $competence]) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette competence ?')">Supprimer</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>@foreach ($employe->competences as $competence)
    <h2>Compétence : {{ $competence->nom_competence }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Note</th>
                <th>Commentaire</th>
                @if (Auth::user()->hasRole('Evaluateur'))
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($competence->evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->note }}</td>
                    <td>{{ $evaluation->commentaire }}</td>
                    @if (Auth::user()->hasRole('Evaluateur'))
                        <td>
                            <button onclick="window.location.href='{{ route('evaluations.edit', ['employe' => $employe->id, 'competence' => $competence->id, 'evaluation' => $evaluation->id]) }}'" class="btn btn-secondary">Modifier</button>
                            <form action="{{ route('evaluations.destroy', ['employe' => $employe, 'competence' => $competence, 'evaluation' => $evaluation]) }}" method="POST" style="display: inline-block">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette évaluation ?')">Supprimer</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (Auth::user()->hasRole('Evaluateur'))
        <button onclick="window.location.href='{{ route('evaluations.create', ['employe' => $employe->id, 'competence' => $competence->id]) }}'" class="btn btn-primary">Ajouter une évaluation</button>
    @endif
@endforeach

</table>
    @if (Auth::user()->hasRole('Employé'))
      <button onclick="window.location.href='{{ route('competences.create', $employe) }}'" class="btn btn-primary">Ajouter</button>
@endif
@endsection