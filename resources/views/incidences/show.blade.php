@extends('layouts.app')
@section('content')

<a href="{{route('incidences.index')}}"> Volver a la Lista de incidencias</a>.

<div class="container">
    <h1>{{$incidence->title}}</h1>
    <p>Creado el &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$incidence->created_at}}</p>
    <p>Creado por &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$incidence->user_name}}
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
    Categoria &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$incidence->category_name}}{{$incidence->department_name}}</p>
    <p>Text:</p>
    <p>{{$incidence->text}}</p>
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

<a class="btn btn-primary btn-sm" href="{{ route('comentarios.create', ['incidence_id' => $incidence->id]) }}" role="button">Crear comentario</a>

@endsection