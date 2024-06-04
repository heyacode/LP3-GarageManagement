@extends('admin.admin')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addmechanic">
                    <i class="fas fa-user-plus"></i> Add a new mechanic
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
                        @foreach ($mechanics as $mechanic)
                            <tr>
                                <td>{{ $mechanic->firstname }} {{ $mechanic->lastname }}</td>
                                <td> {{ $mechanic->email }}</td>
                                <td> {{ $mechanic->phone }}</td>
                                <td> {{ $mechanic->address }}</td>
                                <td>
                                    <div class="btn-group mx-1" role="group" aria-label="Actions">
                                    <button class="btn btn-secondary btn-sm mx-1 btn-show" data-client-id="{{ $mechanic->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button class="btn btn-secondary btn-sm mx-1" data-toggle="modal"
                                        data-target="#editMechanic{{ $mechanic->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <form method="POST" action="{{ route('deleteMechanic') }} " class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="mechanicId" value="{{ $mechanic->id }}">
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

    <!-- Add mechanic Modal -->
    <div class="modal fade" id="addmechanic" tabindex="-1" role="dialog" aria-labelledby="addmechanicLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action=" {{ route('addMechanic') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addmechanicLabel"><i class="fas fa-user-plus"></i> Mechanic Form
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Show mechanic Modal -->
    @foreach ($mechanics as $mechanic)
        <div class="modal fade" id="showMechanic{{ $mechanic->id }}" tabindex="-1" role="dialog"
            aria-labelledby="showMechanicLabel{{ $mechanic->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mechancic Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Username:</strong>
                                {{ $mechanic->username }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Firstname:</strong>
                                {{ $mechanic->firstname }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Last Name:</strong>
                                {{ $mechanic->lastname }}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Phone number:</strong>
                                {{ $mechanic->phone }}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Address:</strong>
                                {{ $mechanic->address }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $mechanic->email }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(document).ready(function() {
            $('.btn-show').click(function() {
                var clientId = $(this).data('client-id');
                $('#showMechanic' + clientId).modal('show');
            });
        });
    </script>

    <!-- Edit mechanic Modal-->
    @foreach ($mechanics as $mechanic)
        <div class="modal fade" id="editMechanic{{ $mechanic->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editMechanicLabel{{ $mechanic->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('updateMechanic') }} ">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editMechanicLabel {{ $mechanic->id }}">Edit mechanic</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value=" {{ $mechanic->id }}">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" value=" {{ $mechanic->username }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" value=" {{ $mechanic->firstname }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" value=" {{ $mechanic->lastname }}"
                                    class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $mechanic->email }} "
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" value="{{ $mechanic->phone }} "
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" value="{{ $mechanic->address }} "
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


@endsection
