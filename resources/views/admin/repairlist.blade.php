<!-- resources/views/admin/clients.blade.php -->
@extends('layouts.app')

@include('layouts.nav')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>repair list</h1>
            @if($repairs->isEmpty())
                <p>Il n'y a pas encore de clients enregistrés.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>description</th>
                            <th>status</th>
                            <th>start_date</th>
                            <th>end_date</th>
                            <th>mecanicNotes</th>
                            <th>clientNotes</th>
                            <th>mecanicId</th>
                            <th>vehicleId</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairs as $repair)
                            <tr>
                                <td>{{ $repair->id }}</td>
                                <td>{{ $repair->description }}</td>
                                <td>{{ $repair->status }}</td>
                                <td>{{ $repair->start_date }}</td>
                                <td>{{ $repair->end_date }}</td>
                                <td>{{ $repair->mecanicNotes }}</td>
                                <td>{{ $repair->repairNotes }}</td>
                                <td>{{ $repair->mecanicId }}</td>
                                <td>{{ $repair->vehicleId }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
