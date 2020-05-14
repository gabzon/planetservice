@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Perfil</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="card border-light mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ $user->avatar }}" class="card-img" alt="{{ $user->name }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $user->name }}</h5>
                                    <p class="card-text">
                                        {{ $user->email }} <br>
                                        {{ $user->telefono1 }} <br>
                                        {{ $user->telefono2 }}
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">Numero de cliente: {{ $user->id }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    @if ($user->direccion)
                    <div class="card">
                        <div class="card-header d-inline-flex align-items-center">
                            <svg class="bi bi-house-fill" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 3.293l6 6V13.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z"
                                    clip-rule="evenodd" />
                            </svg>&nbsp;
                            <b>Direccion</b>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                {{ $user->direccion }} <br>
                                {{ $user->direccion2 }}
                            </li>
                            <li class="list-group-item">{{ $user->codigo_postal }}, {{ $user->lugar }}</li>
                            <li class="list-group-item">{{ $user->estado }}, {{ $user->pais }}</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold" width="20%">birthday:</td>
                                <td>{{ $user->birthday }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Sexo:</td>
                                <td>{{ $user->sexo }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Empresa/Particular:</td>
                                <td>{{ $user->es_empresa }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Verificado:</td>
                                <td>{{ $user->email_verified_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    {{ $user->biografia }}
                </div>

            </div>
            <a href="{{ route('perfil.edit', $user->id) }}" class="btn btn-success">Editar perfil</a>
        </div>
    </div>
</div>
@endsection