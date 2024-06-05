@extends('mechanic.mechanic')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Mechanic Notes</th>
                        <th>Client Notes</th>
                        <th>Mechanic ID</th>
                        <th>Vehicle ID</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px">
                    @foreach ($repairs as $repair)
                        <tr>
                            <td>{{ $repair->id }}</td>
                            <td>{{ $repair->description }}</td>
                            <td>{{ $repair->status }}</td>
                            <td>{{ $repair->start_date }}</td>
                            <td>{{ $repair->end_date }}</td>
                            <td>{{ $repair->mecanicNotes }}</td>
                            <td>{{ $repair->clientNotes }}</td>
                            <td>{{ $repair->mecanicId }}</td>
                            <td>{{ $repair->vehicleId }}</td>
                        </tr>
                    @endforeach
                </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
