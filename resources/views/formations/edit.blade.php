<!-- Formulaire d'édition d'une formation -->
<h1>Modifier la formation</h1>

<form action="{{ route('formations.update', $formation->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nom_formation">Nom de la formation</label>
        <input type="text" id="nom_formation" name="nom_formation" class="form-control" value="{{ $formation->nom_formation }}">
    </div>

    <div class="form-group">
        <label for="description_formation">Description de la formation</label>
        <input type="text" id="description_formation" name="description_formation" class="form-control" value="{{ $formation->description_formation }}">
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
