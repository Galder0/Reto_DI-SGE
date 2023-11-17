@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Edit') }}">
                        @csrf
                        @method('PUT') {{-- Add this line to indicate it's a PUT request --}}

                        <div class="row mb-3">
                            <label for="department" class="col-md-4 col-form-label text-md-end">Department</label>
                            <div class="col-md-6">
                                <select id="department" name="department" class="form-control">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ $department->id == $user->department_id ? 'selected' : '' }}>
                                            {{ $department->depname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }} {{-- Change button text --}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
