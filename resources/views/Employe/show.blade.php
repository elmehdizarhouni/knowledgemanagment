@extends('layouts.app')

@section('content')
<body style="background-image: url('/beige.jpg'); background-size: cover;">
<style>
   .employeeDetailsContainer {
        position: absolute;
        top: 100px;

        padding: 20px;
    }
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
  background: #7fbab3;
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
    font-weight: bold
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
  background: #7fbab3;
  background: -webkit-linear-gradient(to right, #FF0080, #FF8C00, #40E0D0);
  background: linear-gradient(to right, #000000, #000000, #838E42);
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


/* Appliquer le style au tableau */

.table {
  background-color:#F6F0E9;
  width: @table_width;
  table-layout: fixed;
  border-collapse: collapse;
}

.table th, .table td {
  padding: 5px;
  text-align: left;
  
}

.table th {
  text-decoration: underline;
  background-color:#5CA8A6;
  color: @header_text_color;
}
.table tbody tr:nth-child(even) {
  background-color: #8CCDCB;
}

.table tbody tr:nth-child(odd) {
  background-color: #7fbab3;
}
.table th:not(:first-child),
    .table td:not(:first-child) {
        border-left: 1px solid #7fbab3;
    }




    .exportBtn {
    position: absolute;
    top: 40px;
    right: 700px;
    padding: 10px 20px;
    font-size: 16px;
    padding: 1rem 2rem;
    font-weight: 700;
    background: linear-gradient(to right, #964B00, #F5DEB3);
    color: #582900;
    border-radius: .5rem;
    border-bottom: 2px solid #964B00;
    border-right: 2px solid #964B00;
    border-top: 2px solid white;
    border-left: 2px solid white;
    transition-duration: 1s;
    transition-property: border-top, 
        border-left, 
        border-bottom,
        border-right,
        box-shadow;
}

.exportBtn:hover {
    border-top: 2px solid #964B00;
    border-left: 2px solid #964B00;
    border-bottom: 2px solid #964B00;
    border-right: 2px solid #964B00;
    
}



</style>


<div>
  <button class="btn btn-success exportBtn" onclick="window.location.href='{{ route('generatePDF', ['id' => $employe->id]) }}'">Export PDF</button>
</div>



<div class="employeeDetailsContainer">
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
            <th>Note</th>
            <th>Commentaire </th>
            @if (Auth::user()->hasRole('Employé'))
            <th>Actions</th>
           @endif
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
              
                @if (Auth::user()->hasRole('Evaluateur'))
                    @php
                        $hasEvaluation = false;
                    @endphp
                    @foreach ($evaluations as $evaluation)
                        @if ($evaluation->competence_id == $competence->id)
                            @php
                                $hasEvaluation = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @if (!$hasEvaluation)
                        <button onclick="window.location.href='{{ route('evaluations.create', ['employe' => $employe->id, 'competence' => $competence->id]) }}'" class="btn btn-primary">Ajouter une évaluation</button>
                    @else
                    <button onclick="window.location.href='{{ route('evaluations.edit', ['employe' => $employe->id, 'competence' => $competence->id, 'evaluation' => $evaluation->id]) }}'" class="btn btn-secondary">Modifier</button>
                            <form action="{{ route('evaluations.destroy', ['employe' => $employe->id, 'competence' => $competence->id, 'evaluation' => $evaluation->id]) }}" method="POST" style="display: inline-block">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette évaluation ?')">Supprimer</button>
                            </form>
                        </td>
                    @endif
                @endif
            </td>
        </tr>
    @endforeach
</tbody>
</table>

    @if (Auth::user()->hasRole('Employé'))
      <button onclick="window.location.href='{{ route('competences.create', ['employe' => $employe->id, 'competence' => $competence->id]) }}'" class="btn btn-primary">Ajouter</button>
@endif
    </div>
  </div>
</div>

@endsection
