@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Status: {{ $status->name }}</h1>
    <form action="{{ route('statuses.update', $status) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $status->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>

    <a href="{{ route('statuses.index') }}" class="btn btn-secondary mt-3">Back to Statuses</a>
</div>
@endsection
