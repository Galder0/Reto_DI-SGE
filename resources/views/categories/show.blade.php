@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{$category->name}}</h1>
    <strong>Created At:</strong> {{$category->created_at}}<br>
    <strong>Updated At:</strong> {{ $category->updated_at ? $category->updated_at : 'Not Updated' }}
</div>

@endsection