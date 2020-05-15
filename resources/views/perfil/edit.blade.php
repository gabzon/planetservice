@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Editando
        </div>
        <div class="card-body">
            <form action="{{route('perfil.update', $user->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nombre completo:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name ?? old('value')}}"
                        class="form-control">
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email:</label>
                            <input type="text" id="email" name="email" value="{{ $user->email ?? old('value') }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="telefono1" class="font-weight-bold">Telefono principal:</label>
                            <input type="text" id="telefono1" name="telefono1"
                                value="{{ $user->telefono1 ?? old('value') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="telefono2" class="font-weight-bold">Telefono secundario:</label>
                            <input type="text" id="telefono2" name="telefono2"
                                value="{{ $user->telefono2 ?? old('value') }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="profession" class="font-weight-bold">Profession</label>
                            <input type="text" id="profession" name="profession"
                                value="{{ $user->profession ?? old('value')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="birthday" class="font-weight-bold">Cumpleaños</label>
                            <input type="date" id="birthday" name="birthday"
                                value="{{ $user->birthday ?? old('value')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="sexo" class="font-weight-bold">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="es_empresa" class="font-weight-bold">Empresa o particular</label>
                            <select name="es_empresa" id="es_empresa" class="form-control">
                                <option value="particular">Particular</option>
                                <option value="empresa">Empresa</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br>
                <h3>Direccion</h3>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                        <div class="form-group">
                            <label for="direccion" class="font-weight-bold">Calle y numero:</label>
                            <input type="text" id="direccion" name="direccion"
                                value="{{ $user->direccion ?? old('value') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label for="codigo_postal" class="font-weight-bold">Codigo Postal</label>
                            <input type="text" id="codigo_postal" name="codigo_postal"
                                value="{{ $user->codigo_postal ?? old('value')}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="lugar" class="font-weight-bold">lugar</label>
                            <input type="text" id="lugar" name="lugar" value="{{ $user->lugar ?? old('value')}}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="estado" class="font-weight-bold">estado</label>
                            <input type="text" id="estado" name="estado" value="{{ $user->estado ?? old('value')}}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="pais" class="font-weight-bold">pais</label>
                            <input type="text" id="pais" name="pais" value="{{ $user->pais ?? old('value')}}"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="direccion2" class="font-weight-bold">Informacion supplementaria de la
                        direccion <span class="font-italic text-muted">(opcional)</span></label>
                    <input type="text" id="direccion2" name="direccion2" value="{{ $user->direccion2 ?? old('value') }}"
                        class="form-control mt-2">
                </div>

                <div class="form-group">
                    <label for="biografia" class="font-weight-bold">Biografia personal</label>
                    <textarea name="biografia" id="biografia" cols="30" rows="3"
                        class="form-control">{{ $user->biografia ?? old('value') }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection