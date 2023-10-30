@extends('layouts.app')

@section('content')
<ul>
    @foreach ($incidences as $incidence)
    {{-- visualizamos los atributos del objeto --}}
    <li class="pt-1">
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
                <a class="btn btn-warning btn-sm" href="{{ route('incidences.edit', $incidence) }}"
                role="button">Editar</a>
                <form action="{{ route('incidences.destroy', $incidence) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete incidence</button>
                </form>
            </div>
        </div>
        
        {{-- Display comments for this incidence below it --}}
        <div>
            <ul>
                @foreach ($incidence->comentarios as $comentario)
                    <li>Comentario: {{ $comentario->texto }}</li>
                @endforeach
            </ul>
        </div>
    </li>
    @endforeach
</ul>
@endsection
