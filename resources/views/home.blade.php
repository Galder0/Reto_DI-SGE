@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Home</h1>

    @foreach ($incidences as $incidence)
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title"><a href="{{ route('incidences.show', $incidence) }}">{{ $incidence->title }}</a></h2>
            <p class="card-text">
                <strong>Created by:</strong> {{ $incidence->user_name }}
                <br>
                <strong>Category:</strong> {{ $incidence->category_name }}
                <br>
                <strong>Created at:</strong> {{ $incidence->created_at }}
            </p>
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
        {{-- Display comments for this incidence below it --}}
        <div class="card-footer">
            <h6>Comments:</h6>
            <ul class="list-group">
                @foreach ($incidence->comentarios as $comentario)
                <li class="list-group-item"><strong>Comment:</strong> {{ $comentario->texto }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
