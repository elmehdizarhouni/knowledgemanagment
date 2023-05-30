<!-- Formulaire de création d'une formation -->
<h1>Créer une formation</h1>

<form action="{{ route('formations.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nom_formation">Nom de la formation</label>
        <input type="text" id="nom_formation" name="nom_formation" class="form-control">
    </div>

    <div class="form-group">
        <label for="description_formation">Description de la formation</label>
        <input type="text" id="description_formation" name="description_formation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Créer</button>
</form>
