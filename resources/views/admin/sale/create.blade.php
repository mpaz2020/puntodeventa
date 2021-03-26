@extends('layouts.admin')

@section('title', 'Registrar venta')

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
                Registro de venta
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de venta</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {!! Form::open(['route' => 'sales.store', 'method' => 'POST']) !!}
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de venta</h4>
                        </div>

                        <div class="form-group">
                            <label for="client_id">Cliente</label>
                            <select id="client_id" class="form-control" name="client_id">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
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
                                <option value="" disabled selected>Seleccione un producto</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}_{{ $product->stock }}_{{ $product->sell_price }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock actual</label>
                            <input id="stock" class="form-control" type="number" value="" disabled>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Cantidad</label>
                            <input id="quantity" class="form-control" type="number" name="quantity"
                                aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="price">Precio de venta</label>
                            <input id="price" class="form-control" type="number" name="price" aria-describedby="helpId"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="discount">Porcentaje de Descuento</label>
                            <input id="discount" class="form-control" type="number" name="discount" value="0"
                                aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
                        </div>

                        <div class="form-group">
                            <h4 class="card-title">Detalles de venta</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Eliminar</th>
                                            <th>Producto</th>
                                            <th>Precio de venta (PEN)</th>
                                            <th>Descuento</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal (PEN)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right"><span id="total">PEN 0.00</span></p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="5">
                                                <p align="right">TOTAL IMPUESTO (18%):</p>
                                            </th>
                                            <th>
                                                <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="5">
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
                        <button id="guardar" type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{ route('sales.index') }}" class="btn btn-light">Cancelar</a>
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

        var cont = 1;
        var total = 0;
        var subtotal = [];

        $("#guardar").hide();
        $("#product_id").change(mostrarValors);

        function mostrarValors() {
            productos = document.getElementById('product_id').value.split('_');
            $("#price").val(productos[2])
            $("#stock").val(productos[1])
        }

        function agregar() {
            productos = document.getElementById('product_id').value.split('_');
            product_id = productos[0];
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            price = $("#price").val();
            discount = $("#discount").val();
            stock = $("#stock").val();
            impuesto = $("#tax").val();

            if (product_id !== "" && quantity !== "" && quantity > 0 && price !== "" && discount !== "") {
                if (parseInt(stock) >= parseInt(quantity)) {
                    subtotal[cont] = quantity * price;
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" id="fila' + cont +'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +                        ');"><i class="fa fa-times"></i></button></td><td><input type="hidden" id="product_id[]" name="product_id[]" value="' +                        product_id + '">' + producto + '</td><td><input type="hidden" id="price[]" name="price[]" value="' +                        parseFloat(price).toFixed(2) + '"><input type="number" class="form-control" id="price[]" value="' + parseFloat(price).toFixed(2) +                        '" disabled></td><td><input type="hidden" id="discount[]" name="discount[]" value="' +                            parseFloat(discount) + '"><input type="number" class="form-control" id="discount[]" value="' + parseFloat(discount) +'" disabled></td><td><input type="hidden" name="quantity[]" value="' + quantity +'"><input type="number" class="form-control" value="' + quantity +'" disabled></td><td align="right">S/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $("#detalles").append(fila);
                } else {
                    Swal.fire({
                        type: 'error',
                        text: 'la cantidad a vender supera el stock',
                    });
                }
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'rellene todos los campos del detalle de la venta',
                });
            }
        }

        function limpiar() {
            $("#quantity").val("");
            $("#price").val("");
            $("#discount").val(0);
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
