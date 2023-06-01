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
    }

    .card h2 {
        z-index: 1;
        color: white;
        font-size: 2em;
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
    <h2>Créer une formation :

    @if(session('success'))
        <div style="margin-top: 20px; padding: 10px; background-color: #dff0d8; color: #3c763d; border: 1px solid #d6e9c6; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <form style="margin-top: 20px;" method="POST" action="{{ route('formations.store', $employe) }}">
        @csrf

        <table>
            <tr>
                <td><label for="nom_formation">Nom :</label></td>
                <td><input type="text" name="nom_formation" id="nom_formation" class="form-control"></td>
            </tr>

            <tr>
                <td><label for="description_formation">Description :</label></td>
                <td><textarea name="description_formation" id="description_formation" class="form-control"></textarea></td>
            </tr>
        </table>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
    </h2>
</div>

@endsection
