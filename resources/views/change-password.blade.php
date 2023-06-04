@extends('layouts.app')
<style>
        .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Ajustez la hauteur selon vos besoins */
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
    <h1>Modifier mot de passe :</h1>
<form action="{{ route('Employe.updatePassword') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="current_password">Current Password :</label>
        <input type="password" name="current_password" id="current_password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">   New Password   :</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm New Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Change Password</button>
</form>
</div>
    </div>
    </div>
    </div>
    </div>
    
@error('current_password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
