@extends('layouts.app')

@include('layouts.nav')
@section('content')
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="container mt-5">
<h1 class="text-center">Create a New User</h1>
<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label">Username:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="firstname" class="col-sm-2 col-form-label">First Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="lastname" class="col-sm-2 col-form-label">Last Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="address" class="col-sm-2 col-form-label">Address:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Role:</label>
        <div class="col-sm-10">
            <select class="form-select" id="role" name="role" required>
                <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                <option value="mechanic" {{ old('role') == 'mechanic' ? 'selected' : '' }}>Mechanic</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary w-100">Create User</button>
        </div>
    </div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
