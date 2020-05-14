@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $pedido->articulo }}
            <span class="badge badge-warning float-right">{{ $pedido->estado }}</span>
        </div>
        <ul class="list-group list-group-flush">

            @if ($pedido->marca)
            <li class="list-group-item"><strong>Marca: </strong> {{ $pedido->marca }}</li>
            @endif

            @if ($pedido->modelo)
            <li class="list-group-item"><strong>Modelo: </strong> {{ $pedido->modelo }}</li>
            @endif

            @if ($pedido->codigo)
            <li class="list-group-item"><strong>Codigo: </strong> {{ $pedido->codigo }}</li>
            @endif

            @if ($pedido->numero_serie)
            <li class="list-group-item"><strong>numero_serie: </strong> {{ $pedido->numero_serie }}</li>
            @endif

            @if ($pedido->size)
            <li class="list-group-item"><strong>Tamaño: </strong> {{ $pedido->colsizeor }}</li>
            @endif

            @if ($pedido->cantidad)
            <li class="list-group-item"><strong>cantidad: </strong> {{ $pedido->cantidad }}</li>
            @endif

            @if ($pedido->year)
            <li class="list-group-item"><strong>Año: </strong> {{ $pedido->year }}</li>
            @endif

            @if ($pedido->usado)
            <li class="list-group-item"><strong>Uso: </strong> {{ $pedido->usado }}</li>
            @endif

            @if ($pedido->probabilidad)
            <li class="list-group-item"><strong>probabilidad: </strong> {{ $pedido->probabilidad }}</li>
            @endif
        </ul>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">{{ $pedido->categoria->nombre }}</h6>
            <p class="card-text">{{ $pedido->descripcion }}</p>


            <a href="{{ route('home') }}" class="card-link">Back</a>
            <form action="{{ route('pedidos.destroy', $pedido->id ) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection