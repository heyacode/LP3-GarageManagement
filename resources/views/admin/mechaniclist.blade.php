<!-- resources/views/admin/clients.blade.php -->
@extends('layouts.app')

@include('layouts.nav')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Mechanic List</h1>
            <button><a href="/admin/createuser">Ajouter un mechanic</a></button>
            @if($mechanics->isEmpty())
                <p>Il n'y a pas encore de clients enregistrés.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom d'utilisateur</th>
                            <th>Prénom</th>
                            <th>Nom de famille</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mechanics as $mechanic)
                            <tr>
                                <td>{{ $mechanic->id }}</td>
                                <td>{{ $mechanic->username }}</td>
                                <td>{{ $mechanic->firstname }}</td>
                                <td>{{ $mechanic->lastname }}</td>
                                <td>{{ $mechanic->email }}</td>
                                <td>{{ $mechanic->address }}</td>
                                <td>{{ $mechanic->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
