@extends('layouts.admin')

@section('title', 'Gestion de proveedores')

@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }

    </style>
@endsection

@section('create')
<li class="nav-item d-done d-lg-flex">
    <a class="nav-link" type="button" href="{{route('providers.create')}}">
        <span class="btn btn-primary">+ Registrar proveedor</span>
    </a>
</li>
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Proveedores
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Proveedores</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('providers.create') }}" class="dropdown-item">Agregar</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="table-responsive">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Correo Electronico</th>
                                                <th>Telefono / Celular</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($providers as $provider)
                                                <tr>
                                                    <th scope="row">{{ $provider->id }}</th>
                                                    <td>
                                                        <a href="{{ route('providers.show', $provider) }}">{{ $provider->name }}</a>
                                                    </td>
                                                    <td>{{ $provider->email }}</td>
                                                    <td>{{ $provider->phone }}</td>
                                                    <td style="width: 50px;">
                                                        {!! Form::open(['route' => ['providers.destroy', $provider], 'method' => 'DELETE']) !!}
                                                        <a class="jsgrid-button jsgrid-edit-button"
                                                            href="{{ route('providers.edit', $provider) }}"
                                                            title="Editar">
                                                            <i class="far fa-edit"></i>
                                                        </a>

                                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                            type="submit" title="Eliminar">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>

                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('melody/js/data-table.js') !!}

@endsection
