@extends('client.client')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-center">Your Appointments</h1>
        <a class="btn btn-primary" href="{{ route('appointments.create') }}">Add Appointment</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Mark</th>
                <th>Model</th>
                <th>Comment</th>
                <th>Photos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->adate }}</td>
                    <td>{{ $appointment->atime }}</td>
                    <td>{{ $appointment->mark }}</td>
                    <td>{{ $appointment->model }}</td>
                    <td>{{ $appointment->comment }}</td>
                    <td>
                        @if ($appointment->photo)
                            @foreach (json_decode($appointment->photo) as $photo)
                                <img src="{{ asset('storage/' . $photo) }}" alt="Photo" width="50">
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
