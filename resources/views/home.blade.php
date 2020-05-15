@extends('layouts.app')

@section('content')
<div class="container">

    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Excelente!</strong> {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b class="h3">Mis Cotizaciones</b>
                    <span class="float-right">
                        <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary btn-sm">Pedir
                            cotizacion</a>
                    </span>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('home') }}" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4 mt-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">
                                            <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z"
                                                    clip-rule="evenodd" />
                                                <path fill-rule="evenodd"
                                                    d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                    <input type="search" class="form-control" name="search"
                                        placeholder="Buscar en mis cotizaciones..." aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default"
                                        value="{{ request()->query('search') }}">
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Articulo</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Fecha del pedido</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cotizaciones as $item)
                                <tr>
                                    <th scope="row">{{ $item->articulo }}</th>
                                    <td>{{ $item->categoria->nombre }}</td>
                                    <td>{{ $item->cantidad }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @switch($item->estado)
                                        @case('en proceso')
                                        <span class="badge badge-primary">{{ $item->estado }}</span>
                                        @break
                                        @case('cancelado')
                                        <span class="badge badge-danger">{{ $item->estado }}</span>
                                        @break
                                        @case('vencido')
                                        <span class="badge badge-warning">{{ $item->estado }}</span>
                                        @break
                                        @case('completado')
                                        <span class="badge badge-success">{{ $item->estado }}</span>
                                        @break
                                        @default
                                        <span class="badge badge-light">{{ $item->estado }}</span>
                                        @endswitch


                                    </td>
                                    <td>
                                        <a href="{{ route('cotizaciones.show', $item->id) }}"
                                            class="btn btn-sm btn-primary d-inline">
                                            <svg class="bi bi-eye-fill" width="1em" height="1em" viewBox="0 0 16 16"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5 8a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7z"
                                                    clip-rule="evenodd" />
                                            </svg>&nbsp;
                                            Ver
                                        </a>
                                        &nbsp;
                                        <form action="{{ route('cotizaciones.destroy', $item->id )}}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm d-inline">
                                                <svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z"
                                                        clip-rule="evenodd" />
                                                    <path fill-rule="evenodd"
                                                        d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z"
                                                        clip-rule="evenodd" />
                                                    <path fill-rule="evenodd"
                                                        d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z"
                                                        clip-rule="evenodd" />
                                                </svg>&nbsp;
                                                Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>No a solicitado ninguna cotizaciones</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $cotizaciones->appends([ 'search' => request()->query('search') ])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection