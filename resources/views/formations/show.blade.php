<!-- Affichage des détails d'une formation -->
<h1>Détails de la formation</h1>

<p><strong>Nom :</strong> {{ $formation->nom_formation }}</p>
<p><strong>Description :</strong> {{ $formation->description_formation }}</p>

<a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-primary">Modifier</a>
<form action="{{ route('formations.destroy', $formation->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">Supprimer</button>
</form>
