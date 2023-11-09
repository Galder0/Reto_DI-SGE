@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Departments</h1>
    <ul class="list-group">
        @foreach ($departments as $department)
        <li class="list-group-item ">
            <div class="d-flex justify-content-between align-items-center">
                <h2><a href="{{ route('departments.show', $department) }}">{{ $department->depname }}</a></h2>
                <span>Creado el {{ $department->created_at }}</span>
                <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning btn-sm" role="button">Editar</a>
            </div>
            
            @if ($department->incidences->count() === 0)
            <form action="{{ route('departments.destroy', $department) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            @else
            <p class="text-danger">This department has associated incidences.</p>
            @endif

            <ul class="list-group mt-2">
                <li class="list-group-item">Incidences:</li>
                @foreach ($department->incidences->take(5) as $incidence)
                <div class="card mb-3">
                    <div class="card-header"> <a href="{{ route('incidences.show', $incidence) }}"> {{ $incidence->title }}</a>.</div>
                    <div class="card-body"> 
                        <tbody>
                            <tr>
                                Creado el   <td>{{ $incidence->created_at }}</td>
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
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
    <a href="{{ route('departments.create') }}" class="btn btn-primary mt-3">Crear Departamento</a>
</div>
@endsection
