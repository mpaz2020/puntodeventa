@extends('layouts.admin')

@section('title', 'Registrar rol')

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
                Registro de rol
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de rol</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de rol</h4>
                        </div>
                        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="Nombre">
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input id="slug" class="form-control" type="text" name="slug" placeholder="Nombre">
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                        </div>

                        <h3>Permisos especiales</h3>

                        <div class="form-group">
                            <label>{!! Form::radio('special', 'all-access') !!} Acceso total</label>
                            <label>{!! Form::radio('special', 'no-access') !!} Ningun acceso</label>
                        </div>

                        <h3>Lista de permisos</h3>

                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach ($permissions as $permission)
                                    <li>
                                        <label>
                                            {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                                            {{ $permission->name }}
                                            <em>({{ $permission->description }})</em>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
