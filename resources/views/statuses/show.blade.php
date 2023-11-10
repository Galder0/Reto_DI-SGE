@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Status Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $status->name }}</h5>

            <p class="card-text">
                <strong>Created At:</strong> {{ $status->created_at }}
                <strong>Updated At:</strong> {{ $status->updated_at ? $status->updated_at : 'Not Updated' }}
            </p>
        </div>
    </div>

    <a href="{{ route('priorities.index') }}" class="btn btn-secondary mt-3">Back to Statuses</a>
</div>
@endsection
