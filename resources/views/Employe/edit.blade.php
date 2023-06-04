@extends('layouts.app')

@section('content')
<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30vh; /* Ajustez la hauteur selon vos besoins */
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
    .cardBox {
        width: 400px;
  height: 600px;
  position: relative;
  display: grid;
  place-items: center;
  overflow: hidden;
  border-radius: 20px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 10px 0px,
    rgba(0, 0, 0, 0.5) 0px 2px 25px 0px;
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


    .card h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .card p {
        font-size: 2.5rem;
        line-height: 25px;
    }

    .card p {
        font-size: 1rem;
        line-height: 15px; /* ajustez cette valeur selon vos besoins */
    }

    


</style>

<body style="background-image: url('/beige.jpg'); background-size: cover;">
<div class="container">
    <div class="cardBox">
     <div class="card">
        
        <h2>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('Employe.update', $employe) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $employe->nom }}">
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" class="form-control"
                        value="{{ $employe->prenom }}">
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" name="adresse" id="adresse" class="form-control"
                        value="{{ $employe->adresse }}">
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $employe->email }}">
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone :</label>
                    <input type="text" name="telephone" id="telephone" class="form-control"
                        value="{{ $employe->telephone }}">
                </div>

                <div class="form-group">
                    <label for="date_embauche">Date d'embauche :</label>
                    <input type="date" name="date_embauche" id="date_embauche" class="form-control"
                        value="{{ $employe->date_embauche }}">
                </div>

                <div class="form-group">
                    <label for="id_poste">Poste :</label>
                    <select name="id_poste" id="id_poste" class="form-control">
                        <option value="">Sélectionner un poste</option>
                        @foreach($postes as $poste)
                        <option value="{{ $poste->id }}"
                            {{ $poste->id === $employe->id_poste ? 'selected' : '' }}>
                            {{ $poste->nom_poste }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="button">Modifier</button>
            </form>
        </h2>
     </div>
 </div>
</div>
</body>
@endsection
