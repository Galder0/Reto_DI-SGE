@extends('layouts.app')
@section('content')
<h1>PRUEBA</h1>
<div class="container">
    <h1>{{$post->titulo}}</h1>
    <p>Creado el {{$post->created_at}}</p>
    <p>{{$post->texto}}</p>
</div>
@endsection
