@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform"
        action="{{route('departments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="depname" class="form-label">Nombre del Departamento</label>
            <input type="text" class="form-control" id="depname" name="depname" required/>
        </div>
        <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>
@endsection