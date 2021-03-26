@extends('layouts.admin')

@section('title', 'Editar proveedor')

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
                Edicion de proveedores
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('providers.index') }}">proveedores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edicion de proveedores</li>
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
                        {!! Form::model($provider, ['route' => ['providers.update',$provider], 'method' => 'PUT']) !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name"  value="{{$provider->name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input id="email" class="form-control" type="text" name="email" value="{{$provider->email}}" placeholder="ejemplo@gmail.com" required>
                        </div>

                        <div class="form-group">
                            <label for="ruc_number">Numero de RUC</label>
                            <input id="ruc_number" class="form-control" type="number" name="ruc_number" value="{{$provider->ruc_number}}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Direccion</label>
                            <input id="address" class="form-control" type="text" name="address" value="{{$provider->address}}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Numero de contacto</label>
                            <input id="phone" class="form-control" type="text" name="phone" value="{{$provider->phone}}" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
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
