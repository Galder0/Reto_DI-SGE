@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a New Comment</h1>
    <form action="{{ route('comentarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="texto">Comment Text</label>
            <textarea class="form-control" id="texto" name="texto" rows="4"></textarea>
        </div>
            <input type="hidden" name="post_id" value="{{ $post_id }}">
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
</div>
@endsection