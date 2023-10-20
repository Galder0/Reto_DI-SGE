@extends('layouts.app')
@section('content')

<a href="{{route('incidences.index')}}"> Volver a la Lista de incidencias</a>.

<div class="container">
    <h1>{{$incidence->title}}</h1>
    <p>Creado el &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$incidence->created_at}}</p>
    <p>Creado por &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$incidence->user_name}}
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
    Categoria &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$incidence->category_name}}</p>
    <p>Text:</p>
    <p>{{$incidence->text}}</p>
</div>

@endsection