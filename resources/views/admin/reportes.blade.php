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
                        <td class="center">${{$venta->total_de_venta}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col m3">
            <a href="/test" class="btn-block waves-effect waves-light btn">Descargar PDF
                <i class="medium material-icons">file_download</i>
            </a>
        </div>
        <div class="col m3">
            <button id='btn1' class="btn-block waves-effect waves-light btn">Generar gráfica
                <i class="medium material-icons">show_chart</i>
            </button>

            {{csrf_field()}}
        </div>
        <br><br><br><br>
        <div class="row">
            <div class="col m10 offset-m1">
                <div id = "container" style = "width: 100%; height: 400px;"></div>
            </div>
        </div>
    </div>

@endsection

@section('content')

@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('#btn1').click(function(){
                var token = $('input[name=_token]').val();
                var nombres=[];
                var int = [];
                var totales = [];

                $.ajax({
                    url:'/grafica',
                    data: {_token:token},
                    type: 'post',
                    dataType: 'json',

                    success:function(response)
                    {
                        $.each(response,function(i,r){

                            nombres.push(r.Fecha_de_venta);
                            // console.log(nombres);
                            int = parseFloat(r.total_de_venta);
                            totales.push(int);
                            console.log(totales);
                        });


                        Highcharts.chart('container', {
                            chart: {
                                type: 'spline'
                            },
                            title: {
                                text: 'Grafica Ventas'
                            },
                            xAxis: {
                                categories:nombres,
                            },
                            yAxis: {
                                title: {
                                    text: 'Monto'
                                }
                            },


                            series: [{
                                name: 'Total de venta',
                                data: totales,

                            }]

                        });
                    }
                });
            });
        });
    </script>
@endsection