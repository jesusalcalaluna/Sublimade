@extends('admin.base')
@section('content')
    <div class="row center">
        <div class="col s12 m8 offset-m2 ">
            <div class="card grey lighten-5">
                <div class="card-content black-text">
                    <i class="large material-icons left-align">settings</i>
                    <span class="card-title">Cambiar datos de usuario</span>
                    <br>
                    <div class="row">
                        <form class="col s12" method="post" action="actualizarInfo">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="nombre" name="nombre" type="text" class="validate">
                                    <label for="nombre">Nombre</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="apellido" name="apellido" type="text" class="validate">
                                    <label for="apellido">Apellido</label>
                                </div>
                            </div>


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
    </div>
    @endsection
