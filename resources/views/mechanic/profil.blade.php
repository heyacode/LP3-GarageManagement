@extends('client.client')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Profil </h3>
            </div>
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Username:</strong>
                        {{ auth()->user()->username }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Firstname:</strong>
                        {{ auth()->user()->firstname }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name:</strong>
                        {{ auth()->user()->lastname }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone number:</strong>
                        {{ auth()->user()->phone }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        {{ auth()->user()->address }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ auth()->user()->email }}
                    </div>
                </div>
            </div>
            <div class="card-footer"><button class="btn btn-primary"data-toggle="modal" data-target="#editClient{{ auth()->user()->id }}">
                <i class="fa-solid fa-pen"></i>
                Update your profil
            </button></div>

        </div>
    </div>


    <div class="modal fade" id="editClient{{ auth()->user()->id }}" tabindex="-1" role="dialog" aria-labelledby="editClientLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('updateProfilMechanic') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editClientLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="{{ auth()->user()->username }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" value="{{ auth()->user()->firstname }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" value="{{ auth()->user()->lastname }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="{{ auth()->user()->address }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
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
@endsection
