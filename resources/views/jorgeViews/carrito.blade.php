@extends('base')
@section('content')
    <h4 align="center"><strong>Productos en el carrito</strong></h4>
    <div class="row card z-depth-3" style="padding-bottom: 30px; margin-top: 10px">

        <br>
        <div class="col m4 s4" align="center">
            <p style="font-size: 20px"><strong>{{$producto[0]->nombre}}</strong></p>
            <img class="responsive-img" width="150" src="images/universo-espacio-interestelar-2903.jpg" alt="">
        </div>
        <div class="col m4 s4" align="center">
            <p style="font-size: 20px"><strong>Detalles</strong></p>
                Cantidad: {{$cantidad[0]}}<br>
                Talla: Chica <br>
                Tipo de producto: playera <br>
                Precio: MXN$126
        </div>
        <div class="col m3 s3" align="center">
            <p style="font-size: 20px"><strong>Total</strong></p>
            <strong>MXN$126</strong>
        </div>
    </div>
    <div class="row">
        <div class="col m6 m6 offset-m8 offset-s8">
            <h4><strong>Subtotal: MXN$126</strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col m5 s5 offset-m8 offset-s8">
            <form action="">
                    <div class="file-field input-field">

                        <a href="/catalogo" class="btn grey darken-2 z-depth-3">Seguir comprando</a>
                        <div class="file-path-wrapper">
                            <form action="">
                                <button class="btn green darken-2 z-depth-3">Finalizar compra</button>
                            </form>

                        </div>
                    </div>
            </form>
        </div>
    </div>




    @endsection
