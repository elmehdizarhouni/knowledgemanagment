@extends('layouts.app')

@section('content')
<body style="background-image: url('/backggg.jpg'); background-size: cover;">
    
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

            table {
                width: 100%;
                border-collapse: collapse;
            }

            .table th,
            .table td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
                color: black;
                font-weight: bold;
            }

            .table td {
                vertical-align: middle;
            }

            .add-employee-btn {
                position: absolute;
                top: 20px;
                right: 20px;
            }

            button.styled-button {
                     --purple: #9400D3;
                     font-size: 15px;
                     padding: 0.7em 2.7em;
                     letter-spacing: 0.06em;
                     position: relative;
                     font-family: inherit;
                     border-radius: 0.6em;
                     overflow: hidden;
                     transition: all 0.3s;
                     line-height: 1.4em;
                     border: 2px solid var(--purple);
                     background: linear-gradient(to right, rgba(148, 0, 211, 0.1) 1%, transparent 40%, transparent 60%, rgba(148, 0, 211, 0.1) 100%);
                     color: var(--purple);
                     box-shadow: inset 0 0 10px rgba(148, 0, 211, 0.4), 0 0 9px 3px rgba(148, 0, 211, 0.1);
                  }

                  button.styled-button:hover {
                     color: #ff9df3;
                     box-shadow: inset 0 0 10px rgba(148, 0, 211, 0.6), 0 0 9px 3px rgba(148, 0, 211, 0.2);
                  }

                  button.styled-button:before {
                     content: "";
                     position: absolute;
                     left: -4em;
                     width: 4em;
                     height: 100%;
                     top: 0;
                     transition: transform .4s ease-in-out;
                     background: linear-gradient(to right, transparent 1%, rgba(148, 0, 211, 0.1) 40%, rgba(148, 0, 211, 0.1) 60%, transparent 100%);
                  }

                  button.styled-button:hover:before {
                     transform: translateX(15em);
                  }

            /* Styles for the styled delete button */
            button.styled-button.delete-button {
                --red: #FF6B6B;
                color: red;
                border-color: var(--red);
                background: linear-gradient(to right, rgba(255, 107, 107, 0.1) 1%, transparent 40%,transparent 60% , rgba(255, 107, 107, 0.1) 100%);
                box-shadow: inset 0 0 10px rgba(255, 107, 107, 0.4), 0 0 9px 3px rgba(255, 107, 107, 0.1);
            }

            button.styled-button.delete-button:hover {
                color: #FF6B6B;
                box-shadow: inset 0 0 10px rgba(255, 107, 107, 0.6), 0 0 9px 3px rgba(255, 107, 107, 0.2);
            }

            button.styled-button.delete-button:before {
                background: linear-gradient(to right, transparent 1%, rgba(255, 107, 107, 0.1) 40%,rgba(255, 107, 107, 0.1) 60% , transparent 100%);
            }

            button.styled-button.delete-button:hover:before {
                transform: translateX(15em);
            }

            /* Styles for the blue button */
            button.styled-button.blue-button {
                --blue: #1B9AFD;
                color: var(--blue);
                border-color: var(--blue);
                background: linear-gradient(to right, rgba(27, 154, 253, 0.1) 1%, transparent 40%,transparent 60% , rgba(27, 154, 253, 0.1) 100%);
                box-shadow: inset 0 0 10px rgba(27, 154, 253, 0.4), 0 0 9px 3px rgba(27, 154, 253, 0.1);
            }

            button.styled-button.blue-button:hover {
                color: #82aaff;
                box-shadow: inset 0 0 10px rgba(27, 154, 253, 0.6), 0 0 9px 3px rgba(27, 154, 253, 0.2);
            }

            button.styled-button.blue-button:before {
                background: linear-gradient(to right, transparent 1%, rgba(27, 154, 253, 0.1) 40%,rgba(27, 154, 253, 0.1) 60% , transparent 100%);
            }

            button.styled-button.blue-button:hover:before {
                transform: translateX(15em);
            }
            .Btn {
               position: relative;
               width: 160px;
               height: 55px;
               border-radius: 45px;
               border: none;
               background-color: rgb(151, 95, 255);
               color: white;
               box-shadow: 0px 10px 10px rgb(210, 187, 253) inset,
               0px 5px 10px rgba(5, 5, 5, 0.212),
               0px -10px 10px rgb(124, 54, 255) inset;
               cursor: pointer;
               display: flex;
               align-items: center;
               justify-content: center;
}

               .Btn::before {
               width: 70%;
               height: 2px;
               position: absolute;
               background-color: rgba(250, 250, 250, 0.678);
               content: "";
               filter: blur(1px);
               top: 7px;
               border-radius: 50%;
               }

               .Btn::after {
               width: 70%;
               height: 2px;
               position: absolute;
               background-color: rgba(250, 250, 250, 0.137);
               content: "";
               filter: blur(1px);
               bottom: 7px;
               border-radius: 50%;
               }

               .Btn:hover {
               animation: jello-horizontal 0.9s both;
               }

               @keyframes jello-horizontal {
               0% {
                  transform: scale3d(1, 1, 1);
               }

               30% {
                  transform: scale3d(1.25, 0.75, 1);
               }

               40% {
                  transform: scale3d(0.75, 1.25, 1);
               }

               50% {
                  transform: scale3d(1.15, 0.85, 1);
               }

               65% {
                  transform: scale3d(0.95, 1.05, 1);
               }

               75% {
                  transform: scale3d(1.05, 0.95, 1);
               }

               100% {
                  transform: scale3d(1, 1, 1);
               }
               }

        </style>

        <div class="container">
        
            <h1 style="text-align: center; color: nlack; font-weight: bold;">Liste des employés</h1>
            <button type="button" class="Btn" style="position: absolute; top: 20px; right: 20px;">
                <a href="{{ route('Employe.create') }}" style="color: White; text-decoration: none;">
                    Ajouter un employé
                </a>
                <a href="{{ route('Employe.changePassword') }}">Change Password</a>
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
                                <button type="button" class="styled-button">
                                    <a href="{{ route('Employe.edit', $employe->id) }}" style="color: #9400D3; text-decoration: none;">
                                        Modifier
                                    </a>
                                </button>
                                <form
                                    action="{{ route('Employe.destroy', $employe->id) }}"
                                    method="POST"
                                    style="display: inline-block"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="styled-button delete-button"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')"
                                    >
                                        Supprimer
                                    </button>
                                </form>
                                @endif
                                @if ($user->hasRole('Evaluateur') ||$employe->id === $user->employe_id)

                                <form
                                    action="{{ route('Employe.show', $employe->id) }}"
                                    method="GET"
                                    style="display: inline-block"
                                >
                                    @csrf
                                    <button type="submit" class="styled-button blue-button">Afficher</button>
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

