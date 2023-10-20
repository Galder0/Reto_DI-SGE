@extends('layouts.app')
@section('content')
<ul>
    @foreach ($incidences as $incidence)
    {{-- visualizamos los atributos del objeto --}}
    <li class="pt-1">
        <div class="d-flex flex-row">
            <a href="{{route('incidences.show',$incidence)}}"> {{$incidence->title}}</a>.
            <tbody>
                <tr>
                <br>Creado por <td>{{ $incidence->user_name }}</td>
                <br>Categoria <td>{{ $incidence->category_name }}</td>
                <br>Creado el <td>{{ $incidence->created_at }}</td>
                    <!-- Other table cells -->
                </tr>
        </tbody>
        </div>
    </li>
    @endforeach
</ul>

 <!-- Button to create a new incidence -->
 <a href="{{ route('incidences.create') }}" class="btn btn-primary">Create Incidence</a>

@endsection