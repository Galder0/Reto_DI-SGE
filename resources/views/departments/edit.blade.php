@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Department: {{ $department->depname }}</h1>
    <form class="mt-2" name="create_platform" action="{{route('departments.update',$department)}}" 
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
        <label for="depname" class="form-label">Nombre del Departamento</label>
            <input type="text" class="form-control" id="depname" name="depname" required
            value="{{$department->depname}}"/>
        </div>
        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection