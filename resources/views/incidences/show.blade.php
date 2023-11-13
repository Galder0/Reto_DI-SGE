@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Incidencia Details</h1>

    <!-- Incidence Details Card -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $incidence->title }}</h5>

            <!-- Incidence Information -->
            <p class="card-text">
                <strong>Created By:</strong> {{ $incidence->user_name }}<br>
                <strong>Category:</strong> {{ $incidence->category_name }}<br>
                <strong>Created At:</strong> {{ $incidence->created_at }}<br>
                <strong>Updated At:</strong> {{ $incidence->updated_at ? $incidence->updated_at : 'Not Updated' }}<br>
                <strong>Department:</strong> {{ $incidence->department_name }}<br>
                <strong>Status:</strong> {{ $incidence->status ? $incidence->status->name : 'Status not available' }}<br>
                <strong>Priority:</strong> {{ $incidence->priority ? $incidence->priority->name : 'Priority not available' }}<br>
            </p>

            <!-- Incidence Text -->
            <p class="card-text incidence-text">
                <strong>Texto de la Incidencia:</strong><br>
                {{ $incidence->text }}
            </p>
        </div>
    </div>

    <!-- Centered box for comments -->
    <div class="comments-container mt-3">
        <h2>Comentarios</h2>
        @foreach ($comentarios as $comentario)
        <div class="comentario card">
            <div class="card-body">
                <p class="card-text">{{ $comentario->texto }}</p>
                <p class="card-text">
                    <strong>Escrito por:</strong> {{ $comentario->user_name }}<br>
                    <strong>Escrito el:</strong> {{ $comentario->created_at }}<br>
                    <strong>Editado el:</strong> {{ $comentario->updated_at ? $comentario->updated_at : 'Not Updated' }}</li>
                </p>
                @if ($comentario->edited_at)
                    <p class="card-text edited-label">Edited</p>
                @endif
                <!-- Edit button that links to the edit page for the comentario -->
                @if ($comentario->user_id == Auth::user()->id)
                    <a class="btn btn-warning btn-sm" href="{{ route('comentarios.edit', ['comentario' => $comentario->id]) }}" role="button">Editar Comentario</a>
                @endif
                <!-- Delete button for the comentario, only shown if the user is the creator of the incidence -->
                @if (Auth::user()->id == $incidence->user_id)
                    <form action="{{ route('comentarios.destroy', ['comentario' => $comentario->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Borrar Comentario</button>
                    </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Create Comentario button, only shown if the user is in the same department as the incidence -->
    @if (Auth::user()->department_id == $incidence->department_id)
        <a class="btn btn-primary btn-sm mt-3"
            href="{{ route('comentarios.create', ['incidence_id' => $incidence->id]) }}"
            role="button">Crear Comentario</a>
    @endif
</div>

<style>
    /* CSS for the centered comments container */
    .comments-container {
        margin: 0 auto; /* Center the container horizontally */
        width: 70%; /* Adjust the width as needed */
    }

    /* CSS for separating incidence and comment text */
    .incidence-text {
        margin-top: 20px;
        border-top: 1px solid #ccc;
        padding-top: 10px;
    }
</style>
@endsection
