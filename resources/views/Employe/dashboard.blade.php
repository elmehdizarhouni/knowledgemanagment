<h1>Bienvenue sur le tableau de bord, {{ auth()->user()->name }}</h1>

<a href="{{ route('Employe.index') }}" class="btn btn-primary">Afficher les employés</a>
<a href="{{ route('Evaluateur.index') }}" class="btn btn-primary">Afficher les évaluateurs</a>

