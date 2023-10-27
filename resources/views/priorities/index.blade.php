@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Priorities</h1>

    @foreach ($priorities as $priority)
    <div class="card mb-3">
        <div class="card-header">{{ $priority->name }}</div>
        <div class="card-body">
            <h5 class="card-title">Order: {{ $priority->order ?? 'N/A' }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Created At: {{ $priority->created_at }}</h6>
            <p class="card-text">First 5 Incidences:</p>
            <ul>
                @foreach ($priority->incidences->take(5) as $incidence)
                    <li>{{ $incidence->title }}</li>
                @endforeach
            </ul>

            <div class="mt-3">
                <a href="{{ route('priorities.show', $priority) }}" class="btn btn-info">Show</a>
                <a href="{{ route('priorities.edit', $priority) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('priorities.destroy', $priority) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <a href="{{ route('priorities.create') }}" class="btn btn-primary">Create Priority</a>
</div>
@endsection
