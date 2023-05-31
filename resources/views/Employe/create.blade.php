@extends('layouts.app')

@section('content')
<style>
    .card {
        width: 500px;
        height: 500px;
        background: #07182E;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        place-content: center;
        place-items: center;
        overflow: hidden;
        border-radius: 20px;
        padding-left: 20px;
    }

    .card h2 {
        z-index: 1;
        color: white;
        font-size: 2em;
        margin-bottom: 20px; /* Espace en bas */
    }

    .card::before {
        content: '';
        position: absolute;
        width: 100px;
        background-image: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255));
        height: 130%;
        animation: rotBGimg 3s linear infinite;
        transition: all 0.2s linear;
    }

    @keyframes rotBGimg {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .card::after {
        content: '';
        position: absolute;
        background: #07182E;
        inset: 5px;
        border-radius: 15px;
    }  
    button {
        --glow-color: rgb(217, 176, 255);
        --glow-spread-color: rgba(191, 123, 255, 0.781);
        --enhanced-glow-color: rgb(231, 206, 255);
        --btn-color: rgb(100, 61, 136);
        border: .25em solid var(--glow-color);
        padding: 1em 3em;
        color: var(--glow-color);
        font-size: 15px;
        font-weight: bold;
        background-color: var(--btn-color);
        border-radius: 1em;
        outline: none;
        box-shadow: 0 0 1em .25em var(--glow-color),
            0 0 4em 1em var(--glow-spread-color),
            inset 0 0 .75em .25em var(--glow-color);
        text-shadow: 0 0 .5em var(--glow-color);
        position: relative;
        transition: all 0.3s;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20px
    }

    button::after {
        pointer-events: none;
        content: "";
        position: absolute;
        top: 120%;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: var(--glow-spread-color);
        filter: blur(2em);
        opacity: .7;
        transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
    }

    button:hover {
        color: var(--btn-color);
        background-color: var(--glow-color);
        box-shadow: 0 0 1em .25em var(--glow-color),
            0 0 4em 2em var(--glow-spread-color),
            inset 0 0 .75em .25em var(--glow-color);
    }

    button:active {
        box-shadow: 0 0 0.6em .25em var(--glow-color),
            0 0 2.5em 2em var(--glow-spread-color),
            inset 0 0 .5em .25em var(--glow-color);
    }
</style>

<body style="background-image: url('/backggg.jpg'); background-size: cover;">

    <div class="card">
        <h2>Ajouter un employé :

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('Employe.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse : </label>
                <input type="text" name="adresse" id="adresse" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone : </label>
                <input type="text" name="telephone" id="telephone" class="form-control">
            </div>

            <div class="form-group">
                <label for="date_embauche">Date d'embauche : </label>
                <input type="date" name="date_embauche" id="date_embauche" class="form-control">
            </div>

            <div class="form-group">
                <label for="id_poste">Poste :</label>
                <select name="id_poste" id="id_poste" class="form-control">
                    <option value="">Sélectionner un poste</option>
                    @foreach ($postes as $poste)
                        <option value="{{ $poste->id }}">{{ $poste->nom_poste }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="button">Ajouter</button>
        </form>
        </h2>
    </div>
</body>
@endsection
