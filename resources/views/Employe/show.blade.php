@extends('layouts.app')

@section('content')
<body style="background-image: url('/backggg.jpg'); background-size: cover;">
<style>
    .formationContainer {
        position: absolute;
  top: 100px;
  left: 550px;
  padding: 20px;
}

.competenceContainer {
  position: absolute;
  top: 100px;
  right: 0;
  padding: 20px;
}

.cardBox {
  width: 400px;
  height: 500px;
  position: relative;
  display: grid;
  place-items: center;
  overflow: hidden;
  border-radius: 20px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 10px 0px,
    rgba(0, 0, 0, 0.5) 0px 2px 25px 0px;
}

.card {
  position: relative ;
  width: 90%;
  height: 90%;
  background: #000814;
  border-radius: 20px;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
  color: #ffffff;
  overflow: hidden;
  padding: 20px;
  cursor: pointer;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 30px 60px -12px inset,
    rgba(0, 0, 0, 0.5) 0px 18px 36px -18px inset;
}

.card h1 {
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.card p {
  font-size: 2.5rem;
  line-height: 25px;
}

.cardBox::before {
  content: "";
  position: absolute;
  width: 40%;
  height: 150%;
  background: #40E0D0;
  background: -webkit-linear-gradient(to right, #FF0080, #FF8C00, #40E0D0);
  background: linear-gradient(to right, #FF0080, #FF8C00, #40E0D0);
  animation: glowing01 5s linear infinite;
  transform-origin: center;
  animation: glowing 5s linear infinite;
}

@keyframes glowing {
  0% {
    transform: rotate(0);
  }

  100% {
    transform: rotate(360deg);
  }
}

.card p {
  font-size: 1rem;
  line-height: 15px; /* ajustez cette valeur selon vos besoins */
}

.table {
  border: 1px solid #fff;
}

.table th,
.table td {
  border: 1px solid #fff;
  padding: 8px;
  color: #fff;
}

.table th {
  background-color: #000814;
  font-weight: bold;
}

.table td {
  background-color: #000c21;
}

.table .btn {
  border: none;
}
.exportBtn {
  position: absolute;
  top: 40px;
  right: 750px;
  padding: 10px 20px;
  font-size: 16px;
    padding: 1rem 2rem;
    font-weight: 700;
    background: rgb(255, 255, 255);
    color: blueviolet;
    border-radius: .5rem;
    border-bottom: 2px solid blueviolet;
    border-right: 2px solid blueviolet;
    border-top: 2px solid white;
    border-left: 2px solid white;
    transition-duration: 1s;
    transition-property: border-top, 
        border-left, 
        border-bottom,
        border-right,
        box-shadow;
}
.exportBtn:hover{
    border-top: 2px solid blueviolet;
 border-left: 2px solid blueviolet;
 border-bottom: 2px solid rgb(238, 103, 238);
 border-right: 2px solid rgb(238, 103, 238);
 box-shadow: rgba(240, 46, 170, 0.4) 5px 5px, rgba(240, 46, 170, 0.3) 10px 10px, rgba(240, 46, 170, 0.2) 15px 15px;

}

</style>


<div>
  <button class="btn btn-success exportBtn" onclick="window.location.href='{{ route('generatePDF', ['id' => $employe->id]) }}'">Export PDF</button>
</div>




<div class="cardBox">
  <div class="card">
    <h1>Détails de l'employé:</h1>

    <p>Nom : {{ $employe->nom }}</p>
    <p>Prénom : {{ $employe->prenom }}</p>
    <p>Adresse : {{ $employe->adresse }}</p>
    <p>Email : {{ $employe->email }}</p>
    <p>Téléphone : {{ $employe->telephone }}</p>
    <p>Date d'embauche : {{ $employe->date_embauche }}</p>
    <p>Poste : {{ $employe->poste->nom_poste }}</p>
  </div>
</div>

<div class="formationContainer">
  <div class="cardBox">
    <div class="card">
      <h2>Formations :</h2>
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
    </div>
  </div>
</div>

@endsection
