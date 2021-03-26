<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        #datos {
            float: left;
            margin-top: 0%;
            margin-left: 2%;
            margin-right: 2%;
        }

        #encabezado {
            text-align: center;
            margin-left: 35%;
            margin-right: 35%;
            font-size: 12px;
        }

        #fact {
            float: right;
            margin-top: 2%;
            margin-left: 2%;
            margin-right: 2%;
            font-size: 20px;
        }

        section {
            clear: left;
        }

        #cliente {
            text-align: left;
        }

        #fac,
        #fv,
        #fa {
            color: #FFFFFF;
            font-size: 15px;
        }
        #faproveedor {
            width: 40%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }

        #faproveedor thead {
            padding: 20px;
            background: #FF5733;
            text-align: left;
            border-bottom: 1px solid #FFFFFF;
        }

        #facomprador {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
            text-align: center;
        }

        #facomprador thead {
            padding: 20px;
            background: #FF5733;
        }

        #faproducto {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
            text-align: right;
        }

        #faproducto thead{
            padding: 20px;
            background: #FF5733;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

    </style>
</head>

<body>
    <header>
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="">DATOS DEL VENDEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">Nombre: {{ $sale->user->name }}<br>
                                {{-- Dirección: {{ $sale->user->address }} <br>
                                Telefóno: {{ $sale->user->phone }} <br> --}}
                                Email: {{ $sale->user->email }}
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
            <p>N° DE VENTA<br>
                {{ $sale->id }}
            </p>

        </div>
    </header>
    <br>
    <br>
    {{-- <section>
        <div>
            <table id="facomprador">
                <thead>
                    <tr id="fv">
                        <th>COMPRADOR</th>
                        <th>FECHA DE COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $sale->user->name }}</td>
                        <td>{{ $sale->created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section> --}}

    <br>

    <section>
        <div>
            <table id="faproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO VENTA (PEN)</th>
                        <th>DESCUENTO (%)</th>
                        <th>SUBTOTAL (PEN)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                        <tr>
                            <td>{{ $saleDetail->quantity }}</td>
                            <td>{{ $saleDetail->product->name }}</td>
                            <td>{{ $saleDetail->price }}</td>
                            <td>{{ $saleDetail->discount }}</td>
                            <td>{{ number_format($saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price *  $saleDetail->discount / 100, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <p align="right">SUBTOTAL: </p>
                        </th>
                        <th>
                            <p align="right">{{ number_format($subtotal, 2) }}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL IMPUESTO ({{ $sale->tax }}%):</p>
                        </th>
                        <th>
                            <p align="right">{{ number_format($subtotal * $sale->tax / 100, 2) }}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL:</p>
                        </th>
                        <th>
                            <p align="right">{{ number_format($sale->total, 2) }}</p>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <div id="datos">
            <p id="encabezado">
                <b>TGI INGENIERIA</b><br>TGI PERU EIRL<br>Telefono: 123456789<br>Email: medardo.paz@tgiperu.com<br><br>
                Gracias por la compra.
            </p>
        </div>
    </footer>

</body>

</html>
