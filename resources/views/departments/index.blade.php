@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Departments</h1>
    <ul class="list-group">
        @foreach ($departments as $department)
        <div class="card mb-4">
            <li class="list-group-item ">
                <div class="d-flex justify-content-between align-items-center">
                    <h2><a href="{{ route('departments.show', $department) }}">{{ $department->depname }}</a></h2>
                    <span>Creado el {{ $department->created_at }}</span>
                </div>
            
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-warning btn-sm me-2" href="{{ route('departments.edit', $department) }}" role="button">Edit</a>           
                        @if ($department->incidences->count() === 0)
                        <form action="{{ route('departments.destroy', $department) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @else
                        <button class="btn btn-danger btn-sm" type="submit" disabled data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="This top tooltip is themed via CSS variables.">Delete</button>
                        @endif
                    </div>

                <ul class="list-group mt-2">
                    <li class="list-group-item">Incidences:</li>
                    @foreach ($department->incidences->take(5) as $incidence)
                    <div class="card mb-3">
                        <div class="card-header"> <a href="{{ route('incidences.show', $incidence) }}"> {{ $incidence->title }}</a>.</div>
                        <div class="card-body"> 
                            <tbody>
                                <tr>
                                    <strong>Created At:</strong>  <td>{{ $incidence->created_at }}</td>
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
            </li>
        </div>
        @endforeach
    </ul>
    <a href="{{ route('departments.create') }}" class="btn btn-primary mt-3">Crear Departamento</a>
</div>
@endsection
