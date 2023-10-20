@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create an Incidence</h1>

    <form method="POST" action="{{ route('incidences.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <textarea name="text" id="text" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="estimatedtime">Estimated Time</label>
            <input type="number" name="estimatedtime" id="estimatedtime" class="form-control">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Incidence</button>
    </form>
</div>
@endsection
