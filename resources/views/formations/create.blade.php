@extends('layouts.app')

@section('content')
    <h1>Créer une formation</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('formations.store', $employe) }}">
        @csrf

        <div class="form-group">
            <label for="nom_formation">Nom de la formation</label>
            <input type="text" name="nom_formation" id="nom_formation" class="form-control">
        </div>

        <div class="form-group">
            <label for="description_formation">Description de la formation</label>
            <textarea name="description_formation" id="description_formation" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
