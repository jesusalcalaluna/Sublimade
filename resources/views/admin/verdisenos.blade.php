@extends('admin.base')

@section('css')

@endsection
@section('nav')
    @parent
@show
@section('slider')
    <div class="row" style="margin-top: 50px;">
        <div class="col m6 center">
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
        <div class="col s4 offset-s1 input-field">
            <input type="text" id="autocompletado" class="validate" name="diseno">
            <br> <br>
            <h4 style="text-align:center; color: #3d4852;">Registrar diseño</h4>
            <hr style="width: 350px; border-color: #171a1d;">
            <br><br>
            <form class="dropzone" action="cargardiseno" method="post" id="my-dropzone">
                {{csrf_field()}}
                    <input placeholder="Nombre del diseño" name="nombre_diseno" id="disen" type="text" class="validate">
                <br> <br>
                <div>
                    <select name="cate" id="categ">
                        <option value="0" disabled selected>Escoge una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                        @endforeach
                    </select>
                </div>

                <br><br>
                <div class="center-block" style="width: 200px; border-color: #171a1d">
                    <h5 class="dz-message" style="text-align:center; color: #3d4852;">Inserta aquí tu diseño</h5>
                    <div class="fallback">
                        <input type="file" name="file">
                    </div>
                </div>
                <br><br>
                <button class="btn waves-effect waves-light center-align" type="submit" name="btn1" id="enviardis"> Subir diseño
                    <i class="medium material-icons right-align">file_upload</i>
                </button>
            </form>
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
            $('select').formSelect();
            // $("#categ").material_select();
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

        Dropzone.options.myDropzone={
            uploadMultiple: false,
            autoProcessQueue: false,
            autoDiscover: false,
            init: function () {
                var myDropzone=this;

                $("#enviardis").click(function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                    $("#disen").val("");
                    $("#categ").val("0");
                    $('select').formSelect();


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
                    });
                });
                myDropzone.on("complete", function (file) {
                    myDropzone.removeFile(file);
                });
            }
        }
    </script>
@endsection