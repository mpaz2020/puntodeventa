@extends('layouts.admin')

@section('title', 'Panel Administrador')
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
                Panel Administrador
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @foreach ($totales as $total)
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-white bg-success">
                                        <div class="card-body pb-0">
                                            <div class="float-right">
                                                <i class="fas fa-cart-arrow-down fa-4x"></i>
                                            </div>
                                            <div class="text-value h4">
                                                <strong>PEN {{ $total->totalcompra }} (MES ACTUAL)</strong>
                                            </div>
                                            <div class="h3">
                                                Compras
                                            </div>
                                        </div>
                                        <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                            <a href="{{ route('purchases.index') }}" class="small-box-footer h4">
                                                Compras <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-white bg-info">
                                        <div class="card-body pb-0">
                                            <div class="float-right">
                                                <i class="fas fa-shopping-cart fa-4x"></i>
                                            </div>
                                            <div class="text-value h4">
                                                <strong>PEN {{ $total->totalventa }} (MES ACTUAL)</strong>
                                            </div>
                                            <div class="h3">
                                                Ventas
                                            </div>
                                        </div>
                                        <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                            <a href="{{ route('sales.index') }}" class="small-box-footer h4">
                                                Ventas <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center"> Compras - Mes</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="ct-chart">
                                            <canvas id="compras" height="150" ></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center"> Ventas - Mes</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="ct-chart">
                                            <canvas id="ventas"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center"> Ventas diarias</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="ct-chart">
                                            <canvas id="ventas_diarias" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-heading">
                                <h4 class="card-title">productos mas vendidos</h4>
                            </div>
                        </div>
                        <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
                            <div class="datatable-wrapper table-responsive">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th>Nombre</th>
                                            <th>Codigo</th>
                                            <th>Stock</th>
                                            <th>Cantidad vendida</th>
                                            <th>Ver detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productosvendidos as $productosvendido)
                                            <tr>
                                                <td>{{ $productosvendido->id }}</td>
                                                <td>{{ $productosvendido->name }}</td>
                                                <td>{{ $productosvendido->code }}</td>
                                                <td><strong>{{ $productosvendido->stock }}</strong> Unidades</td>
                                                <td><strong>{{ $productosvendido->quantity }}</strong> Unidades</td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('products.show', $productosvendido->id) }}">
                                                        <i class="far fa-eye"></i>
                                                        Ver detalles
                                                    </a>
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

    @endsection

    @section('scripts')

        {!! Html::script('melody/js/data-table.js') !!}
        {!! Html::script('melody/js/chart.js') !!}

        <script>
            var compra = document.getElementById('compras').getContext('2d');
            var ccompra = new Chart(compra, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($compras as $venta)
                    {
                    setLocale(LC_TIME, 'es_ES','Spanish_Spain','Spanish');
                    $mes= strftime('%B',strtotime($venta->mes));

                    echo '"'.$mes.'",';} ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($compras as $reg)
                        {
                            echo ''.$reg->total.',';} ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var venta = document.getElementById('ventas').getContext('2d');
            var cventa = new Chart(venta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventas as $venta)
                    {
                    setLocale(LC_TIME, 'es_ES','Spanish_Spain','Spanish');
                    $mes= strftime('%B',strtotime($venta->mes));

                    echo '"'.$mes.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventas as $reg)
                        {
                            echo ''.$reg->total.',';} ?>],
                        backgroundColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });


            var ctx = document.getElementById('ventas_diarias').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia)
                    {
                    $dia=$ventadia->dia;

                    echo '"'.$dia.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg)
                        {
                            echo ''.$reg->total.',';} ?>],
                        backgroundColor: [
                            'rgba(20, 204, 20, 1)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        </script>

    @endsection
