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
    <h2>Modifier:<!-- Ajout du titre -->

    <form action="{{ route('competences.update', [$employe, $competence]) }}" method="POST">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <td><label for="nom_competence">Nom :</label></td>
                <td><input type="text" name="nom_competence" class="form-control" value="{{ $competence->nom_competence}}" required></td>
            </tr>

            <tr>
                <td><label for="type">Type :</label></td>
                <td>
                    <select name="type" class="form-control" required>
                        <option value="hard skills" @if($competence->type == 'hard skills') selected @endif>Hard Skills</option>
                        <option value="soft skills" @if($competence->type == 'soft skills') selected @endif>Soft Skills</option>
                    </select>
                </td>
            </tr>
        </table>

        <button type="submit" class="button">Mettre à jour la compétence</button>
    </form>
    </h2> 
    </div>
    </div>
    </div>
</body>
@endsection

