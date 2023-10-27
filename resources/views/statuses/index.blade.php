@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statuses</h1>

    @foreach ($statuses as $status)
    <div class="card mb-3">
        <div class="card-header">{{ $status->name }}</div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Created At: {{ $status->created_at }}</h6>
            <p class="card-text">First 5 Incidences:</p>
            <ul>
                @foreach ($status->incidences->take(5) as $incidence)
                    <li>{{ $incidence->title }}</li>
                @endforeach
            </ul>

            <div class="mt-3">
                <a href="{{ route('statuses.show', $status) }}" class="btn btn-info">Show</a>
                <a href="{{ route('statuses.edit', $status) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('statuses.destroy', $status) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <a href="{{ route('statuses.create') }}" class="btn btn-primary">Create Status</a>
</div>
@endsection
