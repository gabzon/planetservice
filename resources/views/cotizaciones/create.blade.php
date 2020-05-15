{{-- tutorail https://codepen.io/brbcoding-the-selector/pen/dyPZOxL --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <b>Nueva Cotization</b>
        </div>
        <div class="card-body">

            <form action="{{ route('cotizaciones.store') }}" method="post" x-data="{ selected: 'opt1' }">
                @csrf

                <div class="form-group row">
                    <label for="categoria" class="col-md-3 col-form-label text-md-right">Categoria:</label>
                    <div class="col-md-8">
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
                </div>

                <div class="form-group row">
                    <label for="probabilidad" class="col-md-3 col-form-label text-md-right">Probabilidad de
                        compra?</label>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="probabilidad" id="comparando"
                                value="comparando" checked>
                            <label class="form-check-label" for="probabilidad">
                                Estoy solo comparando precios
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="probabilidad" id="seguro" value="seguro">
                            <label class="form-check-label" for="probabilidad">
                                Estoy seguro, necesito comprarlo!
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipo_pedido" class="col-md-3 col-form-label text-md-right">Tipo de cotizacion:</label>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input x-on:click="selected = 'opt1'" class="form-check-input" type="radio"
                                name="es_empresa" id="empresa" value="empresa" checked>
                            <label class="form-check-label" for="empresa">
                                Varios y diferentes articulos
                            </label>
                        </div>
                        <div class="form-check">
                            <input x-on:click="selected = 'opt2'" class="form-check-input" type="radio"
                                name="es_empresa" id="particular" value="particular">
                            <label class="form-check-label" for="particular">
                                Un solo tipo de articulo
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label x-show="selected == 'opt1'" for="articulo"
                        class="col-md-3 col-form-label text-md-right">Titulo de la cotization
                        (articulos):</label>
                    <label x-show="selected !== 'opt1'" for="articulo"
                        class="col-md-3 col-form-label text-md-right">Articulo:</label>
                    <div class="col-md-8">
                        <input type="text" id="articulo" name="articulo"
                            class="form-control @error('articulo') is-invalid @enderror">
                        @error('articulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div x-show="selected !== 'opt1'" class="form-group row">
                    <label for="cantidad" class="col-md-3 col-form-label text-md-right">Cantidad:</label>
                    <div class="col-md-3">
                        <input type="text" id="cantidad" name="cantidad" class="form-control">
                    </div>
                </div>

                <div x-show="selected !== 'opt1'">
                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-8">
                            <h5 class="text-muted">Detalles opcionales</h5>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="marca" class="col-md-3 col-form-label text-md-right">Busca alguna marca en
                            particular?</label>
                        <div class="col-md-8">
                            <input type="text" id="marca" name="marca" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="modelo" class="col-md-3 col-form-label text-md-right">Busca algun modelo
                            especifico?</label>
                        <div class="col-md-8">
                            <input type="text" id="modelo" name="modelo" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="codigo" class="col-md-3 col-form-label text-md-right">El articulo usa algun
                            codigo?</label>
                        <div class="col-md-6">
                            <input type="text" id="codigo" name="codigo" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="numero_serie" class="col-md-3 col-form-label text-md-right">Tiene algun
                            numero de serie?</label>
                        <div class="col-md-6">
                            <input type="text" id="numero_serie" name="numero_serie" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="color" class="col-md-3 col-form-label text-md-right">El articulo viene en
                            algun color preferido?</label>
                        <div class="col-md-6">
                            <input type="text" id="color" name="color" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="size" class="col-md-3 col-form-label text-md-right">Tamaño deseado?</label>
                        <div class="col-md-6">
                            <input type="text" id="size" name="size" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year" class="col-md-3 col-form-label text-md-right">Año</label>
                        <div class="col-md-3">
                            <input type="text" id="year" name="year" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="descripcion" class="col-md-3 col-form-label text-md-right">Descripcion:</label>
                    <div class="col-md-8">
                        <textarea name="descripcion" id="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror" cols="30"
                            rows="5"></textarea>
                        @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="usado" class="col-md-3 col-form-label text-md-right">Nuevo o usado:</label>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="usado" id="sin_preferencia"
                                value="sin preferencia" checked>
                            <label class="form-check-label" for="sin_preferencia">
                                Sin preferencia
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="usado" id="nuevo" value="nuevo">
                            <label class="form-check-label" for="nuevo">
                                Busco solo articulos nuevos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="usado" id="usado" value="usado">
                            <label class="form-check-label" for="usado">
                                Articulo usado
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-3 mt-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Pedir Cotizacion') }}
                        </button>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>
@endsection