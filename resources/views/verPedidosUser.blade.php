@extends('base')
@section('content')
    <div class="row">
        <div class="col m10 offset-m1">
            <div class="center">
                <h4><strong>Mis pedidos</strong></h4><br>
                <div class="divider">
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Registro</th>
                    <th>Cliente</th>
                    <th>F.pedido</th>
                    <th>F.entrega</th>
                    <th>Detalles</th>
                    <th>Estado</th>
                    <th>F.R.Entrega</th>
                </tr>
                </thead>
                <tbody  id="pedidos" style="color: black;" >
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->reg_pedido}}</td>
                        <td>{{$pedido->nombre}} {{$pedido->apellido}}</td>
                        <td>{{$pedido->fecha_pedido}}</td>
                        <td>{{$pedido->fecha_entrega}}</td>
                        <td>{{$pedido->detalles}}</td>
                        <td>{{$pedido->estado}}</td>
                        <td>{{$pedido->fecha_real_entrega}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <br><br><br>
    @endsection
