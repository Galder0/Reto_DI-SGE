@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create new Priority</h1>
    <form action="{{ route('priorities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" class="form-control" id="order" name="order" placeholder="From 1 to 100" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Priority</button>
    </form>
</div>
@endsection
