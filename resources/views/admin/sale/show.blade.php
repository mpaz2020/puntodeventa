@extends('layouts.admin')

@section('title', 'Detalles de venta')

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
                Detalles de venta
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles de venta</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-4 text-center">
                                <label for="nombre" class="form-control-label">Cliente</label>
                                <p><a href="{{route('clients.show',$sale->client)}}">{{$sale->client->name}}</a></p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label for="nombre" class="form-control-label">Vendedor</label>
                                <p>{{ $sale->user->name }}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label for="nombre" class="form-control-label">Número de venta</label>
                                <p>{{ $sale->id }}</p>
                            </div>
                        </div>
                        <br /><br />
                        <div class="form-group row">
                            <h4 class="card-title ml-3">Detalle de venta</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio (PEN)</th>
                                            <th>Descuento</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal (PEN)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">SUBTOTAL: </p>
                                            </th>
                                            <th>
                                                <p align="right">{{number_format($subtotal,2)}}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL IMPUESTO ({{$sale->tax}}%):</p>
                                            </th>
                                            <th>
                                                <p align="right">{{number_format($subtotal * $sale->tax/100,2)}}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">{{number_format($sale->total,2)}}</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($saleDetails as $saleDetail)
                                            <tr>
                                                <td>{{$saleDetail->product->name}}</td>
                                                <td>{{$saleDetail->price}}</td>
                                                <td>{{$saleDetail->discount}}</td>
                                                <td>{{$saleDetail->quantity}}</td>
                                                <td>{{number_format($saleDetail->quantity * $saleDetail->price-$saleDetail->quantity * $saleDetail->price*$saleDetail->discount/100,2)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-muted">
                        <a href="{{ route('sales.index') }}" type="button"
                            class="btn btn-primary float-right">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('melody/js/profile-demo.js') !!}
    {!! Html::script('melody/js/data-table.js') !!}

@endsection
