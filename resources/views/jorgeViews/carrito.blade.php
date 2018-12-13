@extends('base')
@section('content')
    <h4 align="center"><strong>Productos en el carrito</strong></h4>
    <br>
    @if(count($producto) == 0)

        <h5 align="center" class="">Aún no tienes productos en el carrito</h5>
        @else

        @foreach($producto as $item)
            <div class="row card z-depth-3" style="padding-bottom: 30px; margin-top: 10px">
                <br>
                <div class="col m4 s4" align="center">
                    <p style="font-size: 20px"><strong>{{$item->nombre}}</strong></p>
                    <img class="responsive-img" width="150" src="storage/disenos/{{$item->diseno}}" alt="">
                </div>
                <div class="col m4 s4" align="center">
                    <p style="font-size: 20px"><strong>Detalles</strong></p>
                    Cantidad: {{$item->cantidad}}<br>
                    Talla:  {{$item->talla}}<br>
                    Tipo de producto: {{$item->tipo}}<br>
                    Precio: MXN${{$item->costo}}
                </div>
                <div class="col m3 s3" align="center">
                    <p style="font-size: 20px"><strong>Total</strong></p>
                    <strong>MXN${{$item->total}}</strong>
                    <form action="eliminarProducto" method="post">
                        {{csrf_field()}}

                        <input id="id_prod" name="id_prod" class="hide" type="text" value="{{$item->id_producto}}">
                        <input id="id_carr" name="id_carr" class="hide" type="text" value="{{$item->id_carrito}}"><br><br>
                        <button type="submit" class="btn red">Eliminar del carrito</button>
                    </form>
                </div>
            </div>
        @endforeach
        @endif
    <hr>
    <div class="row">
        <div class="col m6 m6 offset-m8 offset-s8">

            @if(count($producto)==0)

            @else
                <h4><strong>Subtotal: MXN${{$item->subtotal}}</strong></h4>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col m3 offset-m6">
            <a href="/catalogo" class="btn grey darken-2 "><i class="material-icons left">shopping_cart</i>Seguir comprando</a>
        </div>
        <div class="col m3">
            <form action="finalizarCompra" method="post">
                {{csrf_field()}}
                @if(count($producto)==0)
                @else
                    <input id="subtotal" name="subtotal" class="hide" type="text" value="{{$item->subtotal}}">
                    <input id="id_client" name="id_client" class="hide" type="text" value="{{$item->id_carrito}}">
                    <button class="btn green darken-2" type="submit" ><i class="material-icons left">payment</i>Finalizar compra</button>
                @endif
            </form>
        </div>

    </div>
    @if(count($producto)==0)
        <br><br><br><br><br><br><br>
    @else

    @endif



    @endsection
