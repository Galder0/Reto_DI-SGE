@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories</h1>

    @foreach ($categories as $category)
    <div class="card mb-3">
        <div>
            <div>
                <h2><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></h2>
                <div style="border-top: 1px solid #000; margin: 10px 0;"></div>
            </div>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Created At: {{ $category->created_at }}</h6>
            <p class="card-text">First 5 Incidences:</p>
            <ul>
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
                @endforeach
            </ul>

            <div class="mt-3">
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
</div>
@endsection
