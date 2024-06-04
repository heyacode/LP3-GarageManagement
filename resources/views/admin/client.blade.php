@extends('admin.admin')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addClient">
                    <i class="fas fa-user-plus"></i> Add a new client
                </button>

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
                                <td>
                                    <div class="btn-group mx-1" role="group" aria-label="Actions">
                                    <button class="btn btn-secondary btn-sm mx-1 btn-show" data-client-id="{{ $client->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button class="btn btn-secondary btn-sm mx-1" data-toggle="modal"
                                        data-target="#editClient{{ $client->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <form method="POST" action="{{ route('deleteClient') }} " class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="clientId" value="{{ $client->id }}">
                                        <button class="btn btn-secondary btn-sm mx-1" type="submit">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="addClientLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action=" {{ route('addClient') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addClientLabel"><i class="fas fa-user-plus"></i> Client Form
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">UserName</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">FirstName</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">LastName</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($clients as $client)
        <div class="modal fade" id="showClient{{ $client->id }}" tabindex="-1" role="dialog"
            aria-labelledby="showClientLabel{{ $client->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Client Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Username:</strong>
                                {{ $client->username }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Firstname:</strong>
                                {{ $client->firstname }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Last Name:</strong>
                                {{ $client->lastname }}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Phone number:</strong>
                                {{ $client->phone }}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Address:</strong>
                                {{ $client->address }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $client->email }}
                            </div>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12" style="color: rgb(90, 89, 96)">
                            <div class="form-group">
                                <strong>Vehicle information:</strong>
                            </div>
                        </div>

                        @if($vehicle)
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Mark:</strong>
                                {{ $vehicle->mark }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Model:</strong>
                                {{ $vehicle->model }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Year:</strong>
                                {{ $vehicle->year }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Picture:</strong>
                                <img src="{{ $vehicle->photo }}" alt="photo" width="100px" height="100px">
                            </div>
                        </div>
                    @else
                        <p>No vehicle information available for this client.</p>
                    @endif --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($clients as $client)
        <div class="modal fade" id="editClient{{ $client->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editClientLabel{{ $client->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('updateClient') }} ">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editClientLabel {{ $client->id }}">Edit mechanic</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value=" {{ $client->id }}">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" value=" {{ $client->username }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" value=" {{ $client->firstname }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" value=" {{ $client->lastname }}"
                                    class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $client->email }} "
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" value="{{ $client->phone }} "
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" value="{{ $client->address }} "
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        $(document).ready(function() {
            $('.btn-show').click(function() {
                var clientId = $(this).data('client-id');
                $('#showClient' + clientId).modal('show');
            });
        });
    </script>

@endsection
