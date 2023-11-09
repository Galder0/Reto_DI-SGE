@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statuses</h1>

    @foreach ($statuses as $status)
    <div class="card mb-3">
        <div class="card-header">
            <h2><a href="{{ route('statuses.show', $status) }}">{{ $status->name }}</a></h2>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Created At: {{ $status->created_at }}</h6>
            <p class="card-text">First 5 Incidences:</p>
            <ul>
                @foreach ($status->incidences->take(5) as $incidence)
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
                            <a class="btn btn-warning btn-sm" href="{{ route('incidences.edit', $incidence) }}" role="button">Editar</a>
                        @endif
                        @endauth
                        <form action="{{ route('incidences.destroy', $incidence) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete incidence</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </ul>

            <div class="mt-3">
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
