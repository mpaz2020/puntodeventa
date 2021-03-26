@extends('layouts.admin')

@section('title', 'Registrar usuario')

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
                Registro de usuario
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de usuario</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de usuario</h4>
                        </div>
                        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="Nombre">
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input id="email" class="form-control" type="email" name="email"
                                placeholder="ejemplo@gmail.com">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="password" class="form-control" type="password" name="password">
                        </div>
                        <h3>Lista de roles</h3>
                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach ($roles as $role)
                                    <li>
                                        <label>
                                            {!! Form::checkbox('roles[]', $role->id, null) !!}
                                            {{ $role->name }}
                                            <em>{{ $role->description }}</em>
                                        </label>
                                    </li>

                                @endforeach
                            </ul>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
