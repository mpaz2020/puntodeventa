@extends('layouts.admin')

@section('title', 'Gestion de categorias')
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
    {{-- <li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('categories.create')}}">
      <span class="btn btn-primary">+ Crear Nuevo</span>
    </a>
  </li> --}}
@endsection
@section('options')
@endsection
@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Categorias
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                </ol>
            </nav>
        </div>

        {{-- <div class="row">
            <div class="col-lg-12 grid-margin stretch-card"> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Categorias</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('categories.create') }}" class="dropdown-item">Agregar</a>
                                    {{-- <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button> --}}
                                </div>
                                {{-- <h4 class="card-title">
                                    <a href="#">
                                        <i class="fas fa-download">Exportar</i>
                                    </a>
                                </h4> --}}
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
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($categories as $category)
                                                <tr>
                                                    <th scope="row">{{ $category->id }}</th>
                                                    <td>
                                                        <a
                                                            href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                                                    </td>
                                                    <td>{{ $category->description }}</td>
                                                    <td style="width: 50px;">
                                                        {!! Form::open(['route' => ['categories.destroy', $category], 'method' => 'DELETE']) !!}
                                                        <a class="jsgrid-button jsgrid-edit-button"
                                                            href="{{ route('categories.edit', $category) }}"
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
            {{-- </div>
        </div> --}}
    </div>
@endsection

@section('scripts')

    {!! Html::script('melody/js/data-table.js') !!}

@endsection
