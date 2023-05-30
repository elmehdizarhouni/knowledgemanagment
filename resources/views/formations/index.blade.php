<!-- Affichage de la liste des formations -->
<h1>Liste des formations</h1>

<a href="{{ route('formations.create') }}" class="btn btn-primary">Créer une formation</a>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($formations as $formation)
            <tr>
                <td>{{ $formation->nom_formation }}</td>
                <td>{{ $formation->description_formation }}</td>
                <td>
                    <a href="{{ route('formations.show', $formation->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
