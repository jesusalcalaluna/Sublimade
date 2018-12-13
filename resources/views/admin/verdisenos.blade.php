@extends('admin.base')

@section('css')

@endsection
@section('nav')
    @parent
@show
@section('slider')
    <div class="row" style="margin-top: 50px;">
        <div class="col m6 offset-m1 center">
            <table class="table">
                <thead>
                <tr>
                    <th>Registro</th>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Diseño</th>
                </tr>
                </thead>
                <tbody  id="disenos" style="color: black;" >
                @foreach ($disenos as $diseno)
                    <tr>
                        <td>{{$diseno->id_diseno}}</td>
                        <td>{{$diseno->categoria}}</td>
                        <td>{{$diseno->nombre}}</td>
                        <td><div style="height: 100px; width: 100px"><img style="width: 100px;height: 100px" src="storage/disenos/{{$diseno->diseno}}"></div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col s2 offset-s1 input-field">
            <input type="text" id="autocompletado" class="validate" name="diseno">
        </div>
        <div class="col s1 input-field">
            <button class="btn waves-effect waves-light" type="submit" name="action" id="recarga">
                <i class="medium material-icons">autorenew</i>
            </button>
        </div>
    </div>
@endsection

@section('content')

@endsection
@section('js')
    <script>
        $(document).ready(function(){
            var options = {
                url: "vernombres",

                getValue: "nombre",

                placeholder:"Buscar un diseño",

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
                            url:"/disenosfiltrados",
                            // en data se envían los datos
                            data:{nombre:$("input[name=diseno]").val(),_token:token},
                            type:"post",
                            dataType:'json',
                            success:function (response) {
                                // alert("sss");
                                var cont="";
                                var nombres = $("#disenos");
                                nombres.empty();
                                $.each(response, function(i,r){
                                cont+='<tr><td>'+r.id_diseno+'</td><td>'+r.categoria+'</td><td>'+r.nombre+'</td><td><div style="height: 100px; width: 100px"><img style="width: 100px;height: 100px" src="storage/disenos/'+r.diseno+'"></div></td></tr>'
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
            $("#autocompletado").easyAutocomplete(options);


            $("#recarga").click(function () {

                $.ajax({
                    url:"/vernombres",
                    // en data se envían los datos
                    data:{},
                    type:"get",
                    dataType:'json',
                    success:function (response) {
                        // alert("sss");
                        var cont="";
                        var nombres = $("#disenos");
                        var input=$("#autocompletado");
                        nombres.empty();
                        input.val("");
                        $.each(response, function(i,r){
                            cont+='<tr><td>'+r.id_diseno+'</td><td>'+r.categoria+'</td><td>'+r.nombre+'</td><td><div style="height: 100px; width: 100px"><img style="width: 100px;height: 100px" src="storage/disenos/'+r.diseno+'"></div></td></tr>'
                        });
                        nombres.append(cont);
                    }
                })
            })
        });
    </script>
@endsection