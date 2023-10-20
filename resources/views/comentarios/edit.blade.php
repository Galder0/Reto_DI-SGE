@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Comment</h1>
    <form action="{{ route('comentarios.update', $comentario->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the comment -->
        <div class="form-group">
            <label for="texto">Comment Text</label>
            <textarea class="form-control" id="texto" name="texto" rows="4">{{ $comentario->texto }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Comentario</button>
    </form>
</div>
@endsection
