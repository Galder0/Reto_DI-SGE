@extends('layouts.app')

@section('content')

<ul>
    @foreach ($categories as $category)
    <li class="pt-1">
        <div class="d-flex flex-row">
            <a href="{{ route('categories.show', $category->id) }}"> {{ $category->name }}</a>.
            Escrito el {{ $category->created_at }}

            
            {{-- Delete Button --}}
            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>

<a class="btn btn-primary" href="{{ route('departments.index') }}">Go to Departments</a>

<a class="btn btn-primary" href="{{ route('categories.create') }}">Create a new Category</a>

@endsection