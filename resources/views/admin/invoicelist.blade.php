<!-- resources/views/admin/clients.blade.php -->
@extends('layouts.app')

@include('layouts.nav')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>invoice list</h1>
            @if($invoices->isEmpty())
                <p>Il n'y a pas encore de clients enregistrés.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>repairId</th>
                            <th>additionalCharges</th>
                            <th>totalAmount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->repairId }}</td>
                                <td>{{ $invoice->additionalCharges }}</td>
                                <td>{{ $invoice->totalAmount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
