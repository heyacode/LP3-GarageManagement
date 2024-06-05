@extends('admin.admin')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addInvoice">
                    <i class="fas fa-user-plus"></i> Add a new invoice
                </button>
                {{-- <a href="{{ route('factures.pdf', $invoice->id) }}" class="btn btn-secondary">Télécharger PDF</a> --}}
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>repairId</th>
                        <th>additionalCharges</th>
                        <th>totalAmount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)

                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->repairId }}</td>
                            <td>{{ $invoice->additionalCharges }}</td>
                            <td>{{ $invoice->totalAmount }}</td>
                            <td>
                                <div class="btn-group mx-1" role="group" aria-label="Actions">
                                <button class="btn btn-secondary btn-sm mx-1 btn-show" data-invoice-id="{{ $invoice->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <button class="btn btn-secondary btn-sm mx-1" data-toggle="modal"
                                    data-target="#editInvoice{{ $invoice->id }}">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <form method="POST" action="{{ route('deleteInvoice') }} " class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="invoiceId" value="{{ $invoice->id }}">
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

    <div class="modal fade" id="addInvoice" tabindex="-1" role="dialog" aria-labelledby="addInvoiceLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action=" {{ route('addInvoice') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addInvoiceLabel"><i class="fas fa-user-plus"></i> Invoice Form
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="repairId">Repair</label>
                            <input type="number" name="repairId" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="additionalCharges">Additional charges</label>
                            <input type="number" name="additionalCharges" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="totalAmount">Total Amount</label>
                            <input type="number" name="totalAmount" class="form-control" required>
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
    @foreach ($invoices as $invoice)
        <div class="modal fade" id="showInvoice{{ $invoice->id }}" tabindex="-1" role="dialog"
            aria-labelledby="showInvoiceLabel{{ $invoice->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Invoice Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Repair:</strong>
                                {{ $invoice->repairId }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Additional Charges:</strong>
                                {{ $invoice->additionalCharges }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Total Amount</strong>
                                {{ $invoice->totalAmount }}
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

    @foreach ($invoices as $invoice)
        <div class="modal fade" id="editInvoice{{ $invoice->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editInvoiceLabel{{ $invoice->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('updateInvoice') }} ">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editInvoiceLabel {{ $invoice->id }}">Edit invoice</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value=" {{ $invoice->id }}">
                            <div class="form-group">
                                <label for="repairId">Repair Id</label>
                                <input type="text" name="repairId" value=" {{ $invoice->repairId }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="additionalCharges">Additional Charges</label>
                                <input type="number" name="additionalCharges" value=" {{ $invoice->additionalCharges }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="totalAmount">Total Amount</label>
                                <input type="number" name="totalAmount" value=" {{ $invoice->totalAmount }}"
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
                var invoiceId = $(this).data('invoice-id');
                $('#showInvoice' + invoiceId).modal('show');
            });
        });
    </script>

@endsection
