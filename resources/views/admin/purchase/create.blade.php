@extends('layouts.admin')

@section('title', 'Registrar compra')

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
                Registro de compra
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Compras</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de compra</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {!! Form::open(['route' => 'purchases.store', 'method' => 'POST']) !!}
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de compra</h4>
                        </div>

                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select id="provider_id" class="form-control" name="provider_id">
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tax">Impuesto</label>
                            <input id="tax" class="form-control" type="number" name="tax" aria-describedby="helpId"
                                placeholder="%18">
                        </div>

                        <div class="form-group">
                            <label for="product_id">Producto</label>
                            <select id="product_id" class="form-control" name="product_id">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Cantidad</label>
                            <input id="quantity" class="form-control" type="number" name="quantity"
                                aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="price">Precio de compra</label>
                            <input id="price" class="form-control" type="number" name="price" aria-describedby="helpId">
                        </div>


                        <div class="form-group">
                            <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
                        </div>

                        <div class="form-group">
                            <h4 class="card-title">Detalles de compra</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Eliminar</th>
                                            <th>Producto</th>
                                            <th>Precio (PEN)</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal (PEN)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right"><span id="total">PEN 0.00</span></p>
                                            </th>
                                        </tr>
                                        <tr id="dvOcultar">
                                            <th colspan="4">
                                                <p align="right">TOTAL IMPUESTO (18%):</p>
                                            </th>
                                            <th>
                                                <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL PAGAR:</p>
                                            </th>
                                            <th>
                                                <p align="right">
                                                    <span id="total_pagar_html">PEN 0.00</span>
                                                    <input type="hidden" name="total" id="total_pagar">
                                                </p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer text-muted">
                        <button id="guardar" type="submit" class="btn btn-primary mr-2" >Registrar</button>
                        <a href="{{ route('purchases.index') }}" class="btn btn-light">Cancelar</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('melody/js/alerts.js') !!}
    {!! Html::script('melody/js/avgrund.js') !!}

    <script>
        $(document).ready(function() {
            $("#agregar").click(function() {
                agregar();
            });
        });

        var cont = 0;
        var total = 0;
        var subtotal = [];

        $("#guardar").hide();

        function agregar() {
            product_id = $("#product_id").val();
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            price = $("#price").val();
            impuesto = $("#tax").val();

            if (product_id !== "" && quantity !== "" && quantity > 0 && price !== "") {
                subtotal[cont] = quantity * price;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
                    ');"><i class="fa fa-times"></i></button></td><td><input type="hidden" id="product_id[]" name="product_id[]" value="' +
                    product_id + '">' + producto + '</td><td><input type="hidden" id="price[]" name="price[]" value="' +
                    price + '"><input type="number" class="form-control" id="price[]" value="' + price +
                    '" disabled></td><td><input type="hidden" name="quantity[]" value="' + quantity +
                    '"><input type="number" class="form-control" value="' + quantity +
                    '" disabled></td><td align="right">S/' + subtotal[cont] + '</td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();

                $("#detalles").append(fila);
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'rellene todos los campos del detalle de la compra',
                });
            }
        }

        function limpiar() {
            $("#quantity").val("");
            $("#price").val("");
        }

        function totales() {
            $("#total").html("PEN " + total.toFixed(2));
            total_impuesto = total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("PEN " + total_impuesto.toFixed(2))
            $("#total_pagar_html").html("PEN " + total_pagar.toFixed(2))
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = total * impuesto / 100;
            total_pagar_html = total + total_impuesto;
            $("#total").html("PEN " + total);
            $("#total_impuesto").html("PEN " + total_impuesto)
            $("#total_pagar_html").html("PEN " + total_pagar_html)
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }

    </script>
@endsection
