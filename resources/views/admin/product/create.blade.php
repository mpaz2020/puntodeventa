@extends('layouts.admin')

@section('title', 'Registrar producto')

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
                Registro de productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de productos</h4>
                        </div>
                        {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files'=>true]) !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name" aria-describedby="helpId"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="code">Código de barras</label>
                            <input id="code" class="form-control" type="text" name="code" minlength="8" maxlength="8" aria-describedby="helpId">
                            <small class="text-muted">Campo opcional</small>
                        </div>

                        <div class="form-group">
                            <label for="sell_price">Precio de venta</label>
                            <input id="sell_price" class="form-control" type="number" name="sell_price"
                                aria-describedby="helpId" required>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select id="category_id" class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select id="provider_id" class="form-control" name="provider_id">
                                @foreach ($providers as $provider)
                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="custom-file mb-4">
                            <label for="picture" class="custom-file-label">Seleccionar archivo</label>
                            <input id="picture" class="custom-file-input" type="file" name="picture" lang="es">
                        </div> --}}
                        <div class="card-body">
                            <h4 class="card-title d-flex">Imagen del producto
                            {{-- <small class="ml-auto align-self-end">
                                <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar archivo</a>
                            </small> --}}

                            </h4>
                            <input type="file" id="picture" name="picture" class="dropify" />
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{ route('products.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
{!! Html::script('melody/js/dropify.js') !!}
@endsection
