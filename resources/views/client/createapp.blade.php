@extends('client.client')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Create an Appointment</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('appointments.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="adate" class="form-label">Date:</label>
            <input type="date" class="form-control" id="adate" name="adate" value="{{ old('adate') }}" required>
        </div>
        <div class="mb-3">
            <label for="atime" class="form-label">Time:</label>
            <input type="time" class="form-control" id="atime" name="atime" value="{{ old('atime') }}" required>
        </div>
        <div class="mb-3">
            <label for="mark" class="form-label">Mark:</label>
            <input type="text" class="form-control" id="mark" name="mark" value="{{ old('mark') }}" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model:</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photos:</label>
            <input type="file" class="form-control" id="photo" name="photo[]" multiple>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment:</label>
            <textarea class="form-control" id="comment" name="comment">{{ old('comment') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Create Appointment</button>
    </form>
</div>
@endsection
