@extends('layouts.app')

@section('content')
<ul>
    @foreach ($departments as $department)
    {{-- visualizamos los atributos del objeto --}}
    <li class="pt-1">
        <div class="d-flex flex-row">
            <a href="{{ route('departments.show', $department) }}"> {{ $department->depname }}</a>.
            Creado el {{ $department->created_at }}
            <a class="btn btn-warning btn-sm" href="{{ route('departments.edit', $department) }}"
               role="button">Editar</a>

            {{-- Check if the department has incidences before allowing deletion --}}
            @if ($department->incidences->count() === 0)
                <form action="{{ route('departments.destroy', $department) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            @else
                <p class="text-red-600">This department cannot be deleted as it has associated incidences.</p>
            @endif
        </div>
        
        {{-- Display incidences for this department below it --}}
        <ul>
            @foreach ($department->incidences as $incidence)
                <li>incidencia: {{ $incidence->title }}</li>
            @endforeach
        </ul>
    </li>
    @endforeach
</ul>
<a class="btn btn-primary btn-sm" href="{{ route('departments.create') }}" role="button">Crear Departamento</a>
@endsection
