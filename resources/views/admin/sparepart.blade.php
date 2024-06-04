@extends('admin.admin')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addSparepart">
                    <i class="fas fa-user-plus"></i> Add a new sparepart
                </button>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th>Part Name</th>
                            <th>Part Referance</th>
                            <th>Supplier</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spareparts as $sparepart)
                            <tr>
                                <td>{{ $sparepart->partName }}</td>
                                <td> {{ $sparepart->partReference }}</td>
                                <td> {{ $sparepart->supplier }}</td>
                                <td> {{ $sparepart->price }}</td>
                                <td>
                                    <div class="btn-group mx-1" role="group" aria-label="Actions">
                                    <button class="btn btn-secondary btn-sm mx-1 btn-show" data-sparepart-id="{{ $sparepart->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button class="btn btn-secondary btn-sm mx-1" data-toggle="modal"
                                        data-target="#editSparepart{{ $sparepart->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <form method="POST" action="{{ route('deleteSparepart') }} " class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="sparepartId" value="{{ $sparepart->id }}">
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

    <div class="modal fade" id="addSparepart" tabindex="-1" role="dialog" aria-labelledby="addSparepartLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action=" {{ route('addSparepart') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSparepartLabel"><i class="fas fa-user-plus"></i> SparePart Form
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="partName">Part Name</label>
                            <input type="text" name="partName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="partReference">Part Reference</label>
                            <input type="text" name="partReference" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Supplier">Supplier</label>
                            <input type="text" name="Supplier" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="number" name="price" class="form-control" required>
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
    @foreach ($spareparts as $sparepart)
        <div class="modal fade" id="showSparepart{{ $sparepart->id }}" tabindex="-1" role="dialog"
            aria-labelledby="showSparepartLabel{{ $sparepart->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sparepart Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Part Name:</strong>
                                    {{ $sparepart->partName }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Part Reference:</strong>
                                    {{ $sparepart->partReference }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Supplier:</strong>
                                    {{ $sparepart->supplier }}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    {{ $sparepart->price }}
                                </div>
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

    @foreach ($spareparts as $sparepart)
        <div class="modal fade" id="editSparepart{{ $sparepart->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editSparepartLabel{{ $sparepart->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('updateSparepart') }} ">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSparepartLabel {{ $sparepart->id }}">Edit sparepart</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value=" {{ $sparepart->id }}">
                            <div class="form-group">
                                <label for="partName">Part Name</label>
                                <input type="text" name="partName" value=" {{ $sparepart->partName }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="partReference">Part Reference</label>
                                <input type="text" name="partReference" value=" {{ $sparepart->partReference }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <input type="text" name="supplier" value=" {{ $sparepart->supplier }}"
                                    class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" value="{{ $sparepart->price }} "
                                    class="form-control" required>
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
                var sparepartId = $(this).data('sparepart-id');
                $('#showSparepart' + sparepartId).modal('show');
            });
        });
    </script>

@endsection
