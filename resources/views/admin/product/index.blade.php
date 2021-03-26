@extends('layouts.admin')

@section('title', 'Gestion de productos')

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
    <a class="nav-link" type="button" href="{{route('products.create')}}">
        <span class="btn btn-primary">+ Registrar producto</span>
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
                Productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Productos</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('products.create') }}" class="dropdown-item">Agregar</a>
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
                                                <th>Stock</th>
                                                <th>Estado</th>
                                                <th>Categoria</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($products as $product)
                                                <tr>
                                                    <th scope="row">{{ $product->id }}</th>
                                                    <td>
                                                        <a
                                                            href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                                    </td>
                                                    <td>{{ $product->stock }}</td>
                                                    @if ($product->status === 'ACTIVE')
                                                        <td>
                                                            <a class="jsgrid-button btn btn-success"
                                                                href="{{ route('products.change.status', $product) }}"
                                                                title="Editar">
                                                               Activo <i class="fas fa-check"></i>
                                                            </a>
                                                        </td>
                                                    @else
                                                    <td>
                                                        <a class="jsgrid-button btn btn-danger"
                                                            href="{{ route('products.change.status', $product) }}"
                                                            title="Editar">
                                                            Desactivado<i class="fas fa-times"></i>
                                                        </a>
                                                    </td>
                                                    @endif
                                                    <td>{{ $product->category->name }}</td>
                                                    <td style="width: 50px;">
                                                        {!! Form::open(['route' => ['products.destroy', $product], 'method' => 'DELETE']) !!}
                                                        <a class="jsgrid-button jsgrid-edit-button"
                                                            href="{{ route('products.edit', $product) }}" title="Editar">
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
