@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('statuses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Status</button>
    </form>
</div>
@endsection
