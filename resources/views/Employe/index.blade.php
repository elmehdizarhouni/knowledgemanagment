@extends('layouts.app')

@section('content')
<body style="background-image: url('/beige.jpg'); background-size: cover;">
    
        <style>
            .container {
                margin-top: 20px;
            }

            h1 {
                margin-bottom: 20px;
                color: black;
                font-weight: bold;
            }

            .btn {
                margin-right: 5px;
            }

           
            .table {
  background-color:#F6F0E9;
  width: 86%;
  table-layout: fixed;
  border-collapse: collapse;
  margin-left: 120px
}

.table th, .table td {
  padding: 5px;
  text-align: left;
  
}

.table th {
  text-decoration: underline;
  background-color:#5CA8A6;
  color: @header_text_color;
}
.table tbody tr:nth-child(even) {
  background-color: #8CCDCB;
}

.table tbody tr:nth-child(odd) {
  background-color: #7fbab3;
}
.table th:not(:first-child),
    .table td:not(:first-child) {
        border-left: 1px solid #7fbab3;
    }



            .add-employee-btn {
                position: absolute;
                top: 20px;
                right: 20px;
            }

            button.styled-button {
   --gris-foncé: #424242;
   font-size: 15px;
   padding: 0.7em 2.7em;
   letter-spacing: 0.06em;
   position: relative;
   font-family: inherit;
   border-radius: 0.6em;
   overflow: hidden;
   transition: all 0.3s;
   line-height: 1.4em;
   border: 2px solid var(--gris-foncé);
   background: linear-gradient(to right, rgba(66, 66, 66, 0.1) 1%, transparent 40%, transparent 60%, rgba(66, 66, 66, 0.1) 100%);
   color: var(--gris-foncé);
   box-shadow: inset 0 0 10px rgba(66, 66, 66, 0.4), 0 0 9px 3px rgba(66, 66, 66, 0.1);
}

button.styled-button:hover {
   color: #ff9df3;
   box-shadow: inset 0 0 10px rgba(66, 66, 66, 0.6), 0 0 9px 3px rgba(66, 66, 66, 0.2);
}

button.styled-button:before {
   content: "";
   position: absolute;
   left: -4em;
   width: 4em;
   height: 100%;
   top: 0;
   transition: transform .4s ease-in-out;
   background: linear-gradient(to right, transparent 1%, rgba(66, 66, 66, 0.1) 40%, rgba(66, 66, 66, 0.1) 60%, transparent 100%);
}

button.styled-button:hover:before {
   transform: translateX(15em);
}

button.styled-button.add-employee-button {
   --brown-start: #8B4513;
   --brown-end: #D2691E;
   color: white;
   border-color: var(--brown-start);
   background: linear-gradient(to right, var(--brown-start), var(--brown-end));
}

button.styled-button.add-employee-button:hover {
   color: #fff;
   box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.6), 0 0 9px 3px rgba(0, 0, 0, 0.2);
}

button.styled-button.add-employee-button:before {
   background: linear-gradient(to right, transparent 1%, var(--brown-start) 40%, var(--brown-start) 60%, transparent 100%);
}

button.styled-button.add-employee-button:hover:before {
   transform: translateX(15em);
}


            button.styled-button.add-employee-button {
    --brown-start: #8B4513;
    --brown-end: #D2691E;
    color: white;
    border-color: var(--brown-start);
    background: linear-gradient(to right, var(--brown-start), var(--brown-end));
}

button.styled-button.add-employee-button:hover {
    color: #fff;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.6), 0 0 9px 3px rgba(0, 0, 0, 0.2);
}

button.styled-button.add-employee-button:before {
    background: linear-gradient(to right, transparent 1%, var(--brown-start) 40%, var(--brown-start) 60%, transparent 100%);
}

button.styled-button.add-employee-button:hover:before {
    transform: translateX(15em);
}


        </style>

        <div class="container">
        @include('partials.search')
            <h1 style="text-align: center; color: nlack; font-weight: bold;">Liste des employés</h1>
            @if ($user->hasRole('Evaluateur') )
            <button type="button" class="styled-button add-employee-button" style="position: absolute; top: 115px; right: 1250px;">
                <a href="{{ route('Employe.create') }}" style="color: White; text-decoration: none;">
                    Ajouter un employé
                </a>
            @endif
                <button type="button" class="styled-button add-employee-button" style="position: absolute; top: 115px; right: 20px;">
                    <a href="{{ route('Employe.changePassword') }}"style="color: White; text-decoration: none;">Change Password</a>
                </button>
            </button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Date d'embauche</th>
                        <th>Postes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employes as $employe)
                        <tr>
                            <td>{{ $employe->nom }}</td>
                            <td>{{ $employe->prenom }}</td>
                            <td>{{ $employe->adresse }}</td>
                            <td>{{ $employe->email }}</td>
                            <td>{{ $employe->telephone }}</td>
                            <td>{{ $employe->date_embauche }}</td>
                            <td>{{ $employe->poste->nom_poste }}</td>
                            
                            <td>
                           @if ($user->hasRole('Evaluateur'))
    <button type="button" class="styled-button modifier-button">
        <a href="{{ route('Employe.edit', $employe->id) }}" style="color: #424242; text-decoration: none;">
            Modifier
        </a>
    </button>
    <form action="{{ route('Employe.destroy', $employe->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="styled-button modifier-button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')">
            Supprimer
        </button>
    </form>
@endif

@if ($user->hasRole('Evaluateur') || $employe->id === $user->employe_id)
    <form action="{{ route('Employe.show', $employe->id) }}" method="GET" style="display: inline-block">
        @csrf
        <button type="submit" class="styled-button modifier-button">Afficher</button>
    </form>
@endif

                            </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
@endsection

