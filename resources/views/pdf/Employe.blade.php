<!DOCTYPE html>
<html>
<head>
    <title>Informations de l'employé</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
        }
        
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Informations de l'employé :</h1>
    <table>
        <tr>
            <th>Nom :</th>
            <td>{{ $employe->nom }}</td>
        </tr>
        <tr>
            <th>Prénom :</th>
            <td>{{ $employe->prenom }}</td>
        </tr>
        <tr>
            <th>Adresse :</th>
            <td>{{ $employe->adresse }}</td>
        </tr>
        <tr>
            <th>Email :</th>
            <td>{{ $employe->email }}</td>
        </tr>
        <tr>
            <th>Téléphone :</th>
            <td>{{ $employe->telephone }}</td>
        </tr>
        <tr>
            <th>Date d'embauche :</th>
            <td>{{ $employe->date_embauche }}</td>
        </tr>
        <tr>
            <th>Poste :</th>
            <td>{{ $employe->poste->nom_poste }}</td>
        </tr>
    </table>

    <h2>Formations :</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employe->formations as $formation)
                <tr>
                    <td>{{ $formation->nom_formation }}</td>
                    <td>{{ $formation->description_formation }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Compétences :</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employe->competences as $competence)
                <tr>
                    <td>{{ $competence->nom_competence }}</td>
                    <td>{{ $competence->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

