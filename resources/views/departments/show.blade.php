@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{$department->depname}}</h1>
    <strong>Created At:</strong> {{$department->created_at}}<br>
    <strong>Updated At:</strong> {{ $department->updated_at ? $department->updated_at : 'Not Updated' }}
</div>

@endsection