@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Priority Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $priority->name }}</h5>
            <p class="card-text">
                <strong>Order:</strong> {{ $priority->order ?? 'N/A' }}
            </p>
            <p class="card-text">
                <strong>Created At:</strong> {{ $priority->created_at }}
            </p>
        </div>
    </div>

    <a href="{{ route('priorities.index') }}" class="btn btn-secondary mt-3">Back to Priorities</a>
</div>
@endsection
