@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Nuevo Pedido
        </div>
        <div class="card-body">
            <form action="{{ route('pedidos.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <select name="categoria" id="categoria"
                        class="form-control  @error('categoria_id') is-invalid @enderror" required>
                        <option value="" selected disabled>Seleccionar categoria</option>
                        @foreach ($categorias as $cat)
                        <option value="{{$cat->id}}">{{ $cat->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="articulo" class="text-bold">Articulo:</label>
                            <input type="text" id="articulo" name="articulo"
                                class="form-control @error('articulo') is-invalid @enderror">
                            @error('articulo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cantidad" class="text-bold">Cantidad:</label>
                            <input type="text" id="cantidad" name="cantidad" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion" class="text-bold">Descripcion:</label>
                    <textarea name="descripcion" id="descripcion"
                        class="form-control @error('descripcion') is-invalid @enderror" cols="30" rows="5"></textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="probabilidad" class="text-bold">Probabilidad de compra?</label>
                    <select name="probabilidad" id="probabilidad" class="form-control">
                        <option value="comparando">Estoy comparando precios</option>
                        <option value="seguro">Estoy seguro, necesito comprarlo</option>
                    </select>
                </div>

                <br>

                <h3>Detalles opcionales</h3>

                <div class="form-group">
                    <label for="marca" class="text-bold">Busca alguna marca en particular?</label>
                    <input type="text" id="marca" name="marca" class="form-control">
                </div>

                <div class="form-group">
                    <label for="modelo" class="text-bold">Esta buscando algun modelo especifico?</label>
                    <input type="text" id="modelo" name="modelo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="codigo" class="text-bold">El articulo o producto que busca puede ser encontrado con
                        algun codigo?</label>
                    <input type="text" id="codigo" name="codigo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="numero_serie" class="text-bold">El articulo tiene algun numero de serie?</label>
                    <input type="text" id="numero_serie" name="numero_serie" class="form-control">
                </div>

                <div class="form-group">
                    <label for="color" class="text-bold">El articulo puede ser conseguido en algun color
                        preferido?</label>
                    <input type="text" id="color" name="color" class="form-control">
                </div>

                <div class="form-group">
                    <label for="size" class="text-bold">Tamaño deseado?</label>
                    <input type="text" id="size" name="size" class="form-control">
                </div>

                <div class="form-group">
                    <label for="year" class="text-bold">Año</label>
                    <input type="text" id="year" name="year" class="form-control">
                </div>

                <div class="form-group">
                    <label for="usado" class="text-bold">Puede ser usado?</label>
                    <select id="usado" name="usado" class="form-control">
                        <option value="sin preferencia">Sin preferencia</option>
                        <option value="usado">Busco un articulo usado</option>
                        <option value="nuevo">Busco un articulo nuevo</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Pedir Pedido</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection