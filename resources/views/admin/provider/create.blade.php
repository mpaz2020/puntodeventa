@extends('layouts.admin')

@section('title', 'Registrar proveedor')

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
                Registro de proveedores
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('providers.index') }}">proveedores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de proveedores</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de proveedores</h4>
                        </div>
                        {!! Form::open(['route' => 'providers.store', 'method' => 'POST']) !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input id="email" class="form-control" type="text" name="email" placeholder="ejemplo@gmail.com" required>
                        </div>

                        <div class="form-group">
                            <label for="ruc_number">Numero de RUC</label>
                            <input id="ruc_number" class="form-control" type="number" name="ruc_number" minlength="11" maxlength="11" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Direccion</label>
                            <input id="address" class="form-control" type="text" name="address" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Numero de contacto</label>
                            <input id="phone" class="form-control" type="text" name="phone" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{ route('providers.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
