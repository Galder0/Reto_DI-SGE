@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Statuses</h1>
            @auth
                <!-- Button to create a new incidence -->
                <a href="{{ route('statuses.create') }}" class="btn btn-primary">Create Status</a>
            @endauth
    </div>

    @foreach ($statuses as $status)
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2><a href="{{ route('statuses.show', $status) }}">{{ $status->name }}</a></h2>
                @auth
                <div class="btn-group">
                    <a href="{{ route('statuses.edit', $status) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('statuses.destroy', $status) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-2" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Created At: {{ $status->created_at }}</h6>
            <p class="card-text">First 5 Incidences:</p>
            <ul>
                @foreach ($status->incidences->sortByDesc('created_at')->take(5) as $incidence)
                <div class="card mb-3">
                    <div class="card-header"> <a href="{{ route('incidences.show', $incidence) }}"> {{ $incidence->title }}</a>.</div>
                    <div class="card-body"> 
                        <tbody>
                            <tr>
                                <strong>Created At:</strong>   <td>{{ $incidence->created_at }}</td>
                            </tr>
                        </tbody>
                        @auth
                            @if (auth()->user()->id === $incidence->user_id)
                                <div class="d-flex justify-content-end align-items-center">
                                    <a class="btn btn-warning btn-sm me-2" href="{{ route('incidences.edit', $incidence) }}" role="button">Edit</a>
                                    <form action="{{ route('incidences.destroy', $incidence) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
