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
    <h2>Créer :

    @if(session('success'))
        <div style="margin-top: 20px; padding: 10px; background-color: #dff0d8; color: #3c763d; border: 1px solid #d6e9c6; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <form style="margin-top: 20px;" method="POST" action="{{ route('competences.store', $employe) }}">
        @csrf

        <div class="form-group">
            <label for="nom_competence">Nom :</label>
            <input type="text" name="nom_competence" id="nom_competence" class="form-control">
        </div>

        <div class="form-group">
            <label for="type">Type :</label>
            <select name="type" id="type" class="form-control">
                <option value="hard skills">Hard Skills</option>
                <option value="soft skills">Soft Skills</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer la competence</button>
    </form>
    </h2>
    </div>
    </div>
    </div>

@endsection

