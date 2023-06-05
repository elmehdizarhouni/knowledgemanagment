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
    <h1 style="text-align: center; color: black; font-weight: bold;">Liste des evaluateurs</h1>


    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse Email</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluateur as $eval)
                <tr>
                    <td>{{ $eval->nom_evaluateur}}</td>
                    <td>{{ $eval->prenom_evaluateur}}</td>
                    <td>{{ $eval->email_evaluateur  }}</td>
                
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
