@extends('mechanic.mechanic')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="search" placeholder="Rechercher..." id="search-input">
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->firstname }} {{ $client->lastname }}</td>
                                <td> {{ $client->email }}</td>
                                <td> {{ $client->phone }}</td>
                                <td> {{ $client->address }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
