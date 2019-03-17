<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}"/>


    <style>
        th{
            background-color: #9e9e9e;
            color: white;
        }
        td{
            background-color: #9fa8da;
        }
    </style>
</head>
<body>
<h2 align="center">REPORTE DE VENTAS</h2>
<table align="center">
    <thead>
    <tr>
        <th align="center">Cliente</th>
        <th align="center">Fecha de venta</th>
        <th align="center">Total de venta</th>
    </tr>
    </thead>
    <tbody style="color: black;" >
    @foreach ($ventas as $venta)
        <tr>
            <td align="center">{{$venta->Cliente}}</td>
            <td align="center">{{$venta->Fecha_de_venta}}</td>
            <td align="center">${{$venta->total_de_venta}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>