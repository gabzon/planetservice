@extends('layouts.app')

@section('content')
<div class="container">

    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Exito!</strong> {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b class="h3">Mis Pedidos</b>
                    <span class="float-right">
                        <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-sm">Hacer pedido</a>
                    </span>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Articulo</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha del pedido</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pedidos as $item)
                                <tr>
                                    <th scope="row">{{ $item->articulo }}</th>
                                    <td>{{ $item->categoria->nombre }}</td>
                                    <td>{{ $item->cantidad }}</td>
                                    <td>
                                        <span class="badge badge-warning">{{ $item->estado }}</span>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('pedidos.show', $item->id) }}"
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
                                        <form action="{{ route('pedidos.destroy', $item->id )}}" method="post"
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
                                No a realizado ningun pedido
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection