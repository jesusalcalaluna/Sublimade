    @extends('base')
    @section('css')
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
    <div class="col m10 s10">
        @foreach($productos as $producto)
            <div class="col m3 s3">
                <div class="card z-depth-3" style="color: black;">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg">
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
                                Ver detalles
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
                <form action="#">
            <p>
                <label>
                    <input name="todo" type="radio" checked />
                    <span>Todo</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="mujer" type="radio" />
                    <span>Mujer</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="hombre" type="radio"  />
                    <span>Hombre</span>
                </label>
            </p>
            </form>
            </p>
        </div>
        <div class="divider"></div>
<!--------------------------------------------------productos----------------------------------------------->
        <div class="section">
            <h5>Productos</h5>
            <p>
                <form action="#">
            <p>
                <label>
                    <input name="todo" type="radio" checked />
                    <span>Todo</span>
                </label>
            </p>
            {{--@foreach($tipo_producto as $tipo_producto)--}}
            {{--<p>--}}
                {{--<label>--}}
                    {{--<input name="{{$tipo_producto->nombre}}" type="radio" />--}}
                    {{--<span>{{$tipo_producto->nombre}}</span>--}}
                {{--</label>--}}
            {{--</p>--}}
            {{--@endforeach--}}
            </form>
            </p>
        </div>
        <div class="divider"></div>
<!--------------------------------------------------productos----------------------------------------------->
        <div class="section">
            <h5>Categoria</h5>
            <p>
                <form action="#">
            <p>
                <label>
                    <input name="todo" type="radio" checked />
                    <span>Todo</span>
                </label>
            </p>
            {{--@foreach($categorias as $categoria)--}}
            {{--<p>--}}
                {{--<label>--}}
                    {{--<input name="{{$categoria->nombre}}" type="radio" />--}}
                    {{--<span>{{$categoria->nombre}}</span>--}}
                {{--</label>--}}
            {{--</p>--}}
            {{--@endforeach--}}
            </form>
            </p>
        </div>
    </div>
</div>
    @endsection
    @section('js')
    <script type="text/javascript">

    </script>
    @endsection
