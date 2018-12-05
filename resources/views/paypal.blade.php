@extends('base')
@section('content')

        <div class="row">
                @foreach($productos as $producto)
                    <div class="col m4 s6 offset-s2">
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
        </div>



    <!-- MODAL -->


    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn').click(function () {

                var input = $('#precio').val();
                $.ajax({
                    url:'comprar',
                    data:{precio:input,_token:'{{csrf_token()}}'},
                    type:'POST',
                    datatype:'json',
                    success:function (response) {
                        var modal = '';
                        $.each(response, function (i, v) {

                        });
                    }
                });
            });
        });
    </script>

    @endsection
