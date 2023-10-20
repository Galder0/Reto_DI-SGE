@extends('layouts.app')
@section('content')

<a href="{{route('departments.index')}}"> Volver a la Lista de Departamentos</a>.

<div class="container">
    <h1>{{$department->depname}}</h1>
    <p>Creado el {{$department->created_at}}</p>
</div>

@endsection