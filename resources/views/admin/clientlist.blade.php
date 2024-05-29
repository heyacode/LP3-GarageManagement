<!-- resources/views/admin/clients.blade.php -->
@extends('layouts.app')

@include('layouts.nav')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Clients list</h1>
            @if($clients->isEmpty())
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
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->username }}</td>
                                <td>{{ $client->firstname }}</td>
                                <td>{{ $client->lastname }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->address }}</td>
                                <td>{{ $client->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
