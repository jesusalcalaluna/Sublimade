@extends('admin.base')

@section('css')

@endsection
@section('nav')
    @parent
@show
@section('slider')


    <div class="row">
        <div class="center">
            <h4>REPORTE DE VENTAS</h4>
            <div class="divider">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col m10 offset-m1">
            <table class="table">
                <thead>
                <tr>
                    <th class="center">Cliente</th>
                    <th class="center">Fecha de venta</th>
                    <th class="center">Total de venta</th>
                </tr>
                </thead>
                <tbody  id="ventas" style="color: black;" >
                @foreach ($ventas as $venta)
                    <tr>
                        <td class="center">{{$venta->Cliente}}</td>
                        <td class="center">{{$venta->Fecha_de_venta}}</td>
                        <td class="center">{{$venta->total_de_venta}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col m5">
            <a href="/test" class="btn-block waves-effect waves-light btn">Descargar PDF
                <i class="medium material-icons">file_download</i>
            </a>
        </div>
    </div>

@endsection

@section('content')

@endsection
@section('js')

@endsection