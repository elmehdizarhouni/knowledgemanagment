@extends('layouts.app')

@section('content')
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

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
                                <div class="card-header">Nombre d'evaluateurs :</div>
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
