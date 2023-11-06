@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories</h1>
    <ul class="list-group">
        @foreach ($categories as $category)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div>
                        <span>{{ $category->name }}</span>
                    </div>
                </div>
                <span>Escrito el {{ $category->created_at }}</span>
                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                </form>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">Show</a>
            </div>
            <div id="category_{{ $category->id }}" class="collapse mt-2">
                <!-- Place the content related to the category here (if any) -->
            </div>
        </li>
            @foreach ($category->incidences->take(5) as $incidence)
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
        @endforeach
    </ul>
    <a href="{{ route('departments.index') }}" class="btn btn-primary mt-3">Go to Departments</a>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mt-3">Create a new Category</a>
</div>
@endsection
