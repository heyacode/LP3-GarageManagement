@extends('layouts.app')

@include('layouts.nav')
@section('content')
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="container mt-5">
    <h1 class="text-center">Add a New Spare Part</h1>
    <form method="POST" action="{{ route('spareparts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="partName" class="form-label">Part Name:</label>
            <input type="text" class="form-control" id="partName" name="partName" value="{{ old('partName') }}" required>
        </div>
        <div class="mb-3">
            <label for="partReference" class="form-label">Part Reference:</label>
            <input type="text" class="form-control" id="partReference" name="partReference" value="{{ old('partReference') }}" required>
        </div>
        <div class="mb-3">
            <label for="supplier" class="form-label">Supplier:</label>
            <input type="text" class="form-control" id="supplier" name="supplier" value="{{ old('supplier') }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Add Spare Part</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
