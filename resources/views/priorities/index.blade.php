@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Priorities</h1>

    @php
        // Order priorities by 'order' attribute in descending order
        $priorities = $priorities->sortByDesc('order');
    @endphp

    @foreach ($priorities as $priority)
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2><a href="{{ route('priorities.show', $priority) }}">{{ $priority->name }}</a></h2>
                @auth
                <div class="btn-group">
                    <a href="{{ route('priorities.edit', $priority) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('priorities.destroy', $priority) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-2" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Order: {{ $priority->order ?? 'N/A' }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Created At: {{ $priority->created_at }}</h6>
            <p class="card-text">First 5 Incidences:</p>
            <ul>
                @foreach ($priority->incidences->take(5) as $incidence)
                <div class="card mb-3">
                    <div class="card-header"> <a href="{{ route('incidences.show', $incidence) }}"> {{ $incidence->title }}</a>.</div>
                    <div class="card-body"> 
                        <tbody>
                            <tr>
                                Creado el   <td>{{ $incidence->created_at }}</td>
                                <!-- Other table cells -->
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
    <a href="{{ route('priorities.create') }}" class="btn btn-primary">Create Priority</a>
</div>
@endsection
