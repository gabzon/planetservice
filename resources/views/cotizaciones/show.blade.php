@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $cotizacion->articulo }}
            <span class="badge badge-warning float-right">{{ $cotizacion->estado }}</span>
        </div>
        <ul class="list-group list-group-flush">

            @if ($cotizacion->marca)
            <li class="list-group-item"><strong>Marca: </strong> {{ $cotizacion->marca }}</li>
            @endif

            @if ($cotizacion->modelo)
            <li class="list-group-item"><strong>Modelo: </strong> {{ $cotizacion->modelo }}</li>
            @endif

            @if ($cotizacion->codigo)
            <li class="list-group-item"><strong>Codigo: </strong> {{ $cotizacion->codigo }}</li>
            @endif

            @if ($cotizacion->numero_serie)
            <li class="list-group-item"><strong>numero_serie: </strong> {{ $cotizacion->numero_serie }}</li>
            @endif

            @if ($cotizacion->size)
            <li class="list-group-item"><strong>Tamaño: </strong> {{ $cotizacion->colsizeor }}</li>
            @endif

            @if ($cotizacion->cantidad)
            <li class="list-group-item"><strong>cantidad: </strong> {{ $cotizacion->cantidad }}</li>
            @endif

            @if ($cotizacion->year)
            <li class="list-group-item"><strong>Año: </strong> {{ $cotizacion->year }}</li>
            @endif

            @if ($cotizacion->usado)
            <li class="list-group-item"><strong>Uso: </strong> {{ $cotizacion->usado }}</li>
            @endif

            @if ($cotizacion->probabilidad)
            <li class="list-group-item"><strong>probabilidad: </strong> {{ $cotizacion->probabilidad }}</li>
            @endif
        </ul>
        <div class="card-body">
            {{-- <h6 class="card-subtitle mb-2 text-muted">{{ $cotizacion->categoria->nombre }}</h6> --}}
            <p class="card-text">{{ $cotizacion->descripcion }}</p>


            <a href="{{ route('home') }}" class="card-link">Back</a>
            {{-- <form action="{{ route('cotizaciones.destroy', $cotizacion->id ) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
            </form> --}}
        </div>
    </div>
</div>
@endsection