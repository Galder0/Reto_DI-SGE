@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{$department->depname}}</h1>
    <p>Creado el {{$department->created_at}}</p>
</div>

@endsection