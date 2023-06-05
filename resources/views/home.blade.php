@extends('layouts.dash')

@section('content')
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
body {
    background-image: url('{{ asset('beige.jpg') }}');
    background-size: cover;
}

.sidebar {
    position: fixed;
    width: 200px;
    top: 120px;
    left: 0;
    height: 100vh;
    background-color: white;
    overflow: hidden;
    transition: width .3s ease;
    z-index: 100;
    box-shadow: 4px 7px 10px rgba(0, 0, 0, .4);
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
}

.sidebar:hover {
    width: 300px;
}

.nav__items {
    margin-top: 2rem;
}

.nav__items a {
    display: block;
    padding: 1rem 2rem;
    color: #C0C3C9;
    text-decoration: none;
    font-family: 'Brush Script MT';
    font-weight: 100;
    font-size: 1.35em;
    transition: all .3s ease;
}

.nav__items a:hover {
    background-color: rgba(255, 255, 255, .1);
}

h1 {
    margin-top: 6rem;
    margin-left: 80px;
    text-align: center;
    font-family: 'Brush Script MT';
    font-weight: 100;
    font-size: 4rem;
    text-transform: uppercase;
    color: white;
    letter-spacing: 6px;
    text-shadow: 10px 10px 10px rgba(0, 0, 0, .3);
}

.container {
    margin-left: 250px;
    padding: 2rem;
}

.card {
    margin-bottom: 2rem;
}


</style>

<div class="sidebar">
    <div class="nav__items">
    <a href="{{ route('Employe.index') }}">Les employées</a>

        <a href="{{ route('evaluator.dashboard') }}">Les evaluateurs</a>
        <a href="{{ route('postes.index') }}">Les postes</a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card custom-card-primary mb-3">
                                <div class="card-header">Nombre d'employées :</div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">{{$employe_count}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card custom-card-secondary mb-3">
                                <div class="card-header">Nombre de post :</div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">{{$post_count}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card custom-card-success mb-3">
                                <div class="card-header">Nombre d'evaluateurs:</div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">{{$evaluateur_count}}</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
