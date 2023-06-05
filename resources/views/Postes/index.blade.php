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
    </style>
    <h1 style="text-align: center; color: black; font-weight: bold;">Liste des postes</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postes as $poste)
                <tr>
                    <td>{{ $poste->nom_poste }}</td>
                    <td>{{ $poste->description_poste }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
