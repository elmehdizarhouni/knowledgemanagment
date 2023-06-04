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
    <h1>Ajouter une évaluation</h1>
    <table>
  
   
    <form action="{{ route('evaluations.store', ['employe' => $employe, 'competence' => $competence]) }}" method="POST">
        @csrf
        
      
  <tr>
    <td>
        <div class="form-group">
            <label for="note">Note :</label>
            <td>
            <input type="text" name="note" id="note" class="form-control" required>
            </td>
        </div>
       
        </td>
    </tr>
  <tr>
    <td>
        <div class="form-group">
            <label for="commentaire">Commentaire :</label>
            <td>
            <textarea name="commentaire" id="commentaire" class="form-control" required></textarea>
            </td>
        </div>
        </td>
    </tr>
</table>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    </div>
    </div>
    </div>
@endsection
