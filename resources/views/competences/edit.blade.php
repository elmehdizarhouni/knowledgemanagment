<!-- Formulaire d'édition d'une compétence -->
<form action="{{ route('competences.update', [$employe, $competence]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nom_competence">Nom de la compétence</label>
        <input type="text" name="nom_competence" class="form-control" value="{{ $competence->nom_competence}}" required>
    </div>
    <div class="form-group">
        <label for="type">Type de compétence</label>
        <select name="type" class="form-control" required>
            <option value="hard skills" @if($competence->type == 'hard skills') selected @endif>Hard Skills</option>
            <option value="soft skills" @if($competence->type == 'soft skills') selected @endif>Soft Skills</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour la compétence</button>
</form>
