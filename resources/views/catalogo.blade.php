    @extends('base')
    @section('css')
    <style type="text/css">
    div.grande{
      width: 200px; height: 200px;
    }
    img.grande{
      height: 200px;
    }
    </style>
    @endsection
    @section('nav')
    @parent
    @show
    @section('catalogo')
<div class="row">
  <div class="col s8 offset-s2 center">
      <h4>CATÁLOGO</h4>
    <div class="divider">

    </div>
  </div>
</div>

<div class="row">
    <div class="col m10 s10 catalogo">
        @foreach($productos as $producto)
            <div class="col m3 s3">
                <div class="card z-depth-3" style="color: black;">
                    <div class="card-image grande">
                            <img class="activator grande" src="storage/disenos/{{$producto->diseno}}" align="center">

                    </div>
                    <div class="card-content">
                        <span class="card-title grey-text text-darken-4">{{$producto->nombre}}</span>
                        <p style="color: #dd0007;">Precio: MXN${{$producto->costo_unitario}}</p>
                    </div>
                    <div class="card-action">
                        <form action="detalles" method="post">
                            {{csrf_field()}}
                            <input id="id" name="id" class="hide" type="text" value="{{$producto->id_producto}}">
                            <button  type="submit" class="btn center-block waves-effect waves-block grey darken-4 z-depth-3">
                                <i class="material-icons left">dehaze</i>Ver detalles
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
<!----------------------------------------------------FILTROS----------------------------------------------->
    <div class="col m2 s2">
        <div class="section center">
            <h5>FILTRO</h5>
        </div>
        <div class="divider"></div>
<!----------------------------------------------------sexo----------------------------------------------->
        <div class="section">
            <h5>Sexo</h5>
            <p>
            <p>
                <label>
                    <input name="sexo" value="all" type="radio" checked />
                    <span>Todo</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="sexo" value="mujer" type="radio" />
                    <span>Mujer</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="sexo" value="hombre" type="radio"  />
                    <span>Hombre</span>
                </label>
            </p>
            
            </p>
        </div>
        <div class="divider"></div>
<!--------------------------------------------------productos----------------------------------------------->
        <div class="section">
            <h5>Productos</h5>
            <p>
            <p>
                <label>
                    <input name="tipo_producto" value="all" type="radio" checked />
                    <span>Todo</span>
                </label>
            </p>
            @foreach($tipos_productos as $tipo_producto)
            <p>
                <label>
                    <input name="tipo_producto" value="{{$tipo_producto->id_tipo_producto}}" type="radio" />
                    <span>{{$tipo_producto->nombre}}</span>
                </label>
            </p>
            @endforeach
        </div>
        <div class="divider"></div>
<!--------------------------------------------------productos----------------------------------------------->
        <div class="section">
            <h5>Categoria</h5>
            <p>
            <p>
                <label>
                    <input name="categoria" value="all" type="radio" checked />
                    <span>Todo</span>
                </label>
            </p>
            
            @foreach($categorias as $item)
            <p>
                <label>
                    <input name="categoria" value="{{$item->categoria}}" type="radio" />
                    <span>{{$item->categoria}}</span>
                </label>
            </p>
            @endforeach
        </div>
    </div>
</div>
    @endsection
    @section('js')
    <script type="text/javascript">
        $(document).ready(function(){
        $('input:radio').click(function(){
            $('.catalogo').empty();

            var sex=$('input:radio[name=sexo]:checked').val();
            var producto=$('input:radio[name=tipo_producto]:checked').val();
            var category=$('input:radio[name=categoria]:checked').val();
            $.ajax({
                url:'/catalogo',
                data:{filtro:{sexo:sex, tipo_prododucto:producto,categoria:category}},
                type:'POST',
                dataType:'json',

                success:function(response){

                    var li="";
                    var lista=$(".catalogo");
                    $.each(response, function(i, v){

                       li+= '<div class="col m3 s3"><div class="card z-depth-3" style="color:black;"><div class="card-image grande"><img class="activator grande" src="storage/disenos/'+v.diseno+'" align="center"></div><div class="card-content"><span class="card-title grey-text text-darken-4">'+v.nombre+'</span><p style="color: #dd0007;">Precio: MXN$'+v.costo+'</p></div><div class="card-action"><form action="detalles" method="post"> {{csrf_field()}}<input id="id" name="id" class="hide" type="text" value="'+v.id_producto+'"><button  type="submit" class="btn center-block waves-effect waves-block grey darken-4 z-depth-3"><i class="material-icons left">dehaze</i>Ver detalles</button></form></div></div></div>'

                    });
                    lista.append(li);
                }
            });        
        });

    });

    </script>
    @endsection
