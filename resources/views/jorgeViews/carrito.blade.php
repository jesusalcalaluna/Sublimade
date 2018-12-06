@extends('base')
@section('content')

    <div class="row card z-depth-3" style="padding: 10px; margin-top: 10px">
        <h5>Productos:</h5>
        <br>
        <div class="col m4" style="border-left: black; border-style: double" align="center">
            <img class="responsive-img" width="150" src="images/universo-espacio-interestelar-2903.jpg" alt="">
            <p style="font-size: 20px"><strong>Playera</strong></p>
        </div>
        <div class="col m5">
            Cantidad: 50
            Talla: Chica
            Tipo de producto: playera
            Precio: MXN$126

        </div>
        <div class="col m3">
            Total: MXN$126
        </div>
    </div>
    <div class="row">
        <div class="col m6 offset-m8">
            <form action="">
                    <div class="file-field input-field">
                        <button class="btn grey darken-2 z-depth-3">Seguir comprando</button>
                        <div class="file-path-wrapper">
                            <button class="btn green darken-2 z-depth-3">Finalizar compra</button>
                        </div>
                    </div>

            </form>
        </div>
    </div>



    @endsection
