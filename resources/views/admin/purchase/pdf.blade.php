<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de compra</title>
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
            background: #33AFFF;
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
            background: #33AFFF;
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
            background: #33AFFF;
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
                        <th id="">DATOS DEL PROVEEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">Nombre: {{ $purchase->provider->name }}<br>
                                Dirección: {{ $purchase->provider->address }} <br>
                                Telefóno: {{ $purchase->provider->phone }} <br>
                                Email: {{ $purchase->provider->email }}
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
            <p>N° DE COMPRA<br>
                {{ $purchase->id }}
            </p>

        </div>
    </header>
    <br>
    <br>
    <section>
        <div>
            <table id="facomprador">
                <thead>
                    <tr id="fv">
                        <th>COMPRADOR</th>
                        <th>FECHA COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $purchase->user->name }}</td>
                        <td>{{ $purchase->created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <br>

    <section>
        <div>
            <table id="faproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO COMPRA (PEN)</th>
                        <th>SUBTOTAL (PEN)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseDetails as $purchaseDetail)
                        <tr>
                            <td>{{ $purchaseDetail->quantity }}</td>
                            <td>{{ $purchaseDetail->product->name }}</td>
                            <td>{{ $purchaseDetail->price }}</td>
                            <td>{{ number_format($purchaseDetail->quantity * $purchaseDetail->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <p align="right">SUBTOTAL: </p>
                        </th>
                        <th>
                            <p align="right">{{ number_format($subtotal, 2) }}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL IMPUESTO ({{ $purchase->tax }}%):</p>
                        </th>
                        <th>
                            <p align="right">{{ number_format($subtotal * $purchase->tax / 100, 2) }}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL:</p>
                        </th>
                        <th>
                            <p align="right">{{ number_format($purchase->total, 2) }}</p>
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
