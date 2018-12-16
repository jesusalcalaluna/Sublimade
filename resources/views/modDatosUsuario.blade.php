@extends('base')
@section('content')
    <div class="row center">
        <div class="col s12 m6 ">
            <div class="card grey lighten-5">
                <div class="card-content black-text">
                    <i class="large material-icons left-align">settings</i>
                    <span class="card-title">Cambiar datos de usuario</span>
                    <br>
                    <div class="row">
                        <form class="col s12" method="post" action="actualizarinfo">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="telefono-casa" name="telefono" type="tel" class="validate">
                                    <label for="telefono-casa">Telefono casa</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="telefono-cel" name="celular" type="tel" class="validate">
                                    <label for="telefono-cel">Telefono celular</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s9">
                                    <input id="direccion" name="direccion" type="text" class="validate">
                                    <label for="direccion">Direccion</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="cp" name="cp" type="text" class="validate">
                                    <label for="cp">Codigo Postal</label>
                                </div>
                            </div>


                            <button type="submit" class="btn green darken-2"><i class="material-icons left">check</i>Listo </button>

                        </form>

                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card grey lighten-5">
                <div class="card-content">
                    <i class="large material-icons left-align">account_circle</i>
                    <span class="card-title">Datos actuales</span>
                    <ul>
                        <li><strong>Nombre:</strong> {{$usuario->nombre}}</li>
                        <br>
                        <li><strong>Apellidos:</strong> {{$usuario->apellido}}</li>
                        <br>
                        <li><strong>Telefono de casa:</strong> {{$usuario->tel_casa}}</li>
                        <br>
                        <li><strong>Celular:</strong> {{$usuario->tel_celular}}</li>
                        <br>
                        <li><strong>Direccion:</strong> {{$usuario->direccion}}</li>
                        <br>
                        <li><strong>Código postal:</strong> {{$usuario->cp}}</li>
                    </ul>

                </div>


            </div>


        </div>
    </div>
    @endsection
