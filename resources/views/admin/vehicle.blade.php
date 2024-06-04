@extends('admin.admin')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mark</th>
                            <th>Model</th>
                            <th>Fuel Type</th>
                            <th>Registration</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 13px">
                        @foreach ($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->mark }}</td>
                                <td>{{ $vehicle->model }}</td>
                                <td>{{ $vehicle->fuelType }}</td>
                                <td>{{ $vehicle->registration }}</td>
                                <td><img src="{{ $vehicle->photo }}" alt="photo" width="80px" height="80px"></td>
                                <td>
                                    <div class="btn-group mx-1" role="group" aria-label="Actions">
                                    <button class="btn btn-secondary btn-sm mx-1 btn-show" data-vehicle-id="{{ $vehicle->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button class="btn btn-secondary btn-sm mx-1" data-toggle="modal"
                                        data-target="#editVehicle{{ $vehicle->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <form method="POST" action="{{ route('deleteVehicle') }} " class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="vehicleId" value="{{ $vehicle->id }}">
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

    @foreach ($vehicles as $vehicle)
        <div class="modal fade" id="showVehicle{{ $vehicle->id }}" tabindex="-1" role="dialog"
            aria-labelledby="showVehicleLabel{{ $vehicle->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Vehicle Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                                        <strong>Fuel Type:</strong>
                                        {{ $vehicle->fuelType }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Registration:</strong>
                                        {{ $vehicle->registration }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Photo:</strong>
                                        <img src="{{ $vehicle->photo }}" alt="photo" width="100px" height="100px">
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

    @foreach ($vehicles as $vehicle)
        <div class="modal fade" id="editVehicle{{ $vehicle->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editVehicleLabel{{ $vehicle->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('updateVehicle') }} " enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editVehicleLabel {{ $vehicle->id }}">Edit vehicle</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value=" {{ $vehicle->id }}">
                            <div class="form-group">
                                <label for="mark" class="col-sm-2 col-form-label">Mark:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mark" name="mark" value="{{ $vehicle->mark }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="model" class="col-sm-2 col-form-label">Model:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fuelType" class="col-sm-2 col-form-label">FuelType:</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="fuelType">
                                    <option value="Gasoline" {{ $vehicle->fueltype == 'Gasoline' ? 'selected' : '' }}>Gasoline</option>
                                    <option value="Diesel" {{ $vehicle->fueltype == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="registration" class="col-sm-2 col-form-label">Registration:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="registration" name="registration"
                                        value="{{ $vehicle->registration }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="col-sm-2 col-form-label">photo:</label>
                                <input type="file" name="photo" class="form-control">
                                {{-- @if ($vehicle->photo)
                                    <img src="{{ asset('storage/photos/' . $vehicle->photo) }}" alt="Photo"
                                        style="width: 100px; height: 100px;">
                                @endif --}}
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
                var vehicleId = $(this).data('vehicle-id');
                $('#showVehicle' + vehicleId).modal('show');
            });
        });
    </script>

@endsection
