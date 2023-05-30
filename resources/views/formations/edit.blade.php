@extends('layouts.app')

@section('content')
    <h1>Modifier la formation</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('employes.formations.update', [$employe, $formation]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom_formation">Nom de la formation</label>
            <input type="text" name="nom_formation" id="nom_formation" class="form-control" value="{{ $formation->nom_formation }}">
        </div>

        <div class="form-group">
            <label for="description_formation">Description de la formation</label>
            <textarea name="description_formation" id="description_formation" class="form-control">{{ $formation->description_formation }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection

