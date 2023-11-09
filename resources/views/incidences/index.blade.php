@extends('layouts.app')

@section('content')
<!-- <ul> -->
    @foreach ($incidences as $incidence)
    {{-- visualizamos los atributos del objeto --}}
    <!-- <li class="pt-1"> -->
        <div class="card mb-3">
            <div class="card-header"> <a href="{{ route('incidences.show', $incidence) }}"> {{ $incidence->title }}</a>.</div>
            <div class="card-body"> 
                <tbody>
                    <tr>
                        Creado por  <td>{{ $incidence->user_name }}</td>
                        <br>Categoria   <td>{{ $incidence->category_name }}</td>
                        <br>Creado el   <td>{{ $incidence->created_at }}</td>
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

        {{-- Display comments for this incidence below it --}}
        @auth
        <div class="card mb-2">
            <ul>
                @foreach ($incidence->comentarios as $comentario)
                    <li>Comentario: {{ $comentario->texto }}</li>
                @endforeach
            </ul>
        </div>
        @endauth
    <!-- </li> -->
    @endforeach
<!-- </ul> -->

<!-- Button to create a new incidence -->
<a href="{{ route('incidences.create') }}" class="btn btn-primary">Create Incidence</a>
@endsection
