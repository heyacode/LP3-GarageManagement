<!-- resources/views/admin/clients.blade.php -->
@extends('layouts.app')

@include('layouts.nav')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>sparepart list</h1>
            <button><a href="/admin/createsparepart">Ajouter une piece</a></button>
            @if($spareparts->isEmpty())
                <p>Il n'y a pas encore de clients enregistrés.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>partName</th>
                            <th>partReference</th>
                            <th>supplier</th>
                            <th>price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($spareparts as $sparepart)
                            <tr>
                                <td>{{ $sparepart->id }}</td>
                                <td>{{ $sparepart->partName }}</td>
                                <td>{{ $sparepart->partReference }}</td>
                                <td>{{ $sparepart->supplier }}</td>
                                <td>{{ $sparepart->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
