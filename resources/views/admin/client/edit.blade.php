@extends('layouts.admin')

@section('title', 'Editar cliente')

@section('styles')
@endsection

@section('create')
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Edicion de cliente
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edicion de cliente</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Edicion de cliente</h4>
                        </div>
                        {!! Form::model($client, ['route' => ['clients.update', $client], 'method' => 'PUT']) !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{$client->name}}" aria-describedby="helpId"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input id="dni" class="form-control" type="number" name="dni" value="{{$client->dni}}" aria-describedby="helpId"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="ruc">RUC</label>
                            <input id="ruc" class="form-control" type="number" name="ruc" value="{{$client->ruc}}" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                        </div>
                        <div class="form-group">
                            <label for="address">Direcion</label>
                            <input id="address" class="form-control" type="text" name="address" value="{{$client->address}}" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono / Celular</label>
                            <input id="phone" class="form-control" type="number" name="phone" value="{{$client->phone}}" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{$client->email}}" aria-describedby="helpId">
                            <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
