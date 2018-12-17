 @extends('admin.base')

    @section('css')

    @endsection
    @section('nav')
    @parent
    @show
    @section('slider')

        <div class="row">
            <div class="center">
                <h4>PEDIDOS</h4>
                <div class="divider">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m8">
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
                            <td>{{$pedido->id_cliente}}</td>
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
            <div class="col m3 offset-m1">
                <input type="text" id="clienteusu" class="validate" name="cliente">
            </div>
        </div>
    @endsection

    @section('content')
    @endsection
    @section('js')
        <script>
            $(document).ready(function(){
                $('select').formSelect();
                var options = {
                    url: "/verpedidos",

                    getValue: "id_cliente",

                    placeholder:"Buscar pedido de un cliente",

                    list: {
                        showAnimation: {
                            type: "fade", //normal|slide|fade
                            time: 400,
                            callback: function() {}
                        },
                        hideAnimation: {
                            type: "slide", //normal|slide|fade
                            time: 400,
                            callback: function() {}
                        },
                        onChooseEvent: function() {
                            var token=$("input[name=_token]").val();

                            $.ajax({
                                url:"/clientesfiltrados",
                                // en data se envían los datos
                                data:{nombre:$("input[name=cliente]").val(),_token:token},
                                type:"post",
                                dataType:'json',
                                success:function (response) {
                                    // alert("sss");
                                    var cont="";
                                    var nombres = $("#pedidos");
                                    nombres.empty();
                                    $.each(response, function(i,r){
                                        cont+='<tr><td>'+r.reg_pedido+'</td><td>'+r.id_cliente+'</td><td>'+r.fecha_pedido+'</td><td>'+r.fecha_entrega+'</td><td>'+r.detalles+'</td> <td>'+r.estado+'</td><td>'+r.fecha_real_entrega+'</td></tr>'
                                    });
                                    nombres.append(cont);

                                }
                            })
                        },

                        match: {
                            enabled: true
                        }
                    }
                };
                $("#clienteusu").easyAutocomplete(options);
            });
</script>
    @endsection