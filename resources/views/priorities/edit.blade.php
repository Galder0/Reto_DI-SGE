@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Priority</h1>

    <form action="{{ route('priorities.update', $priority) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $priority->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" class="form-control" id="order" name="order" value="{{ $priority->order }}" placeholder="Optional">
        </div>

        <button type="submit" class="btn btn-primary">Update Priority</button>
    </form>

    <a href="{{ route('priorities.index') }}" class="btn btn-secondary mt-3">Back to Priorities</a>
</div>
@endsection
