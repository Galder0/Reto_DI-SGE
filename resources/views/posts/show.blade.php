@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{$post->titulo}}</h1>
    <p>Creado el {{$post->created_at}}</p>
    <p>{{$post->texto}}</p>
</div>


<div class="comentarios">
    <h2>Comentarios</h2>
    @foreach ($comentarios as $comentario)
    <div class="comentario">
            <p>{{ $comentario->texto }}</p>
            <p>Escrito por {{ $comentario->user_name }}</p>
            <p>Escrito el {{ $comentario->created_at }}</p>
            @if ($comentario->edited_at)
                <p class="edited-label">Edited</p>
            @endif
            <!-- Edit button that links to the edit page for the comentario -->
            <a class="btn btn-warning btn-sm" href="{{ route('comentarios.edit', ['comentario' => $comentario->id]) }}" role="button">Editar Comentario</a>
        </div>
    @endforeach
</div>

<a class="btn btn-primary btn-sm" href="{{ route('comentarios.create', ['post_id' => $post->id]) }}" role="button">Crear comentario</a>

@endsection




