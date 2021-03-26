@extends('layouts.admin')

@section('title', 'Gestion de empresa')

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
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Gestion de empresa
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestion de empresa</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Gestion de empresa</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>
                                    <i class="fas fa-file-signature mr-1"></i>
                                    Nombre
                                </strong>
                                <p class="text-muted">
                                    {{ $business->name }}
                                </p>
                                <hr>
                                <strong>
                                    <i class="fas fa-align-left mr-1"></i>
                                    Descripcion
                                </strong>
                                <p class="text-muted">
                                    {{ $business->description }}
                                </p>
                                <hr>
                                <strong>
                                    <i class="fas fa-address-card mr-1"></i>
                                    Direccion
                                </strong>
                                <p class="text-muted">
                                    {{ $business->address }}
                                </p>
                                <hr>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>
                                    <i class="fas fa-calculator mr-1"></i>
                                    RUC
                                </strong>
                                <p class="text-muted">
                                    {{ $business->ruc }}
                                </p>
                                <hr>
                                <strong>
                                    <i class="fas fa-envelope mr-1"></i>
                                    Correo electronico
                                </strong>
                                <p class="text-muted">
                                    {{ $business->mail }}
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            Logo
                                        </strong>
                                    </div>
                                    <div class="col-md-6">
                                        <img style="width: 50px; height: 50px;" src="{{ asset('image/'.$business->logo) }}"
                                            alt="log" class="rounded float-left">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#exampleModal-2">
                            Editar
                            <i class="fa fa-edit ml-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::model($business, ['route' => ['business.update', $business], 'method' => 'PUT', 'files' => true]) !!}

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{$business->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea name="description" id="description" rows="3">{{$business->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="address">Direccion</label>
                        <input id="address" class="form-control" type="text" name="address" value="{{$business->address}}">
                    </div>
                    <div class="form-group">
                        <label for="name">RUC</label>
                        <input id="name" class="form-control" type="number" name="name" value="{{$business->ruc}}">
                    </div>
                    <div class="form-group">
                        <label for="mail">Correo elecronico</label>
                        <input id="mail" class="form-control" type="email" name="mail" value="{{$business->mail}}">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title d-flex">Logo</h5>
                        <input type="file" id="picture" name="picture" class="dropify" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('melody/js/dropify.js') !!}
@endsection
