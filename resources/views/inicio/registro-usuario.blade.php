    @extends('base')
    @section('css')
    <style type="text/css">

    </style>
    @endsection
    @section('nav')
    @parent
    @show
    @section('content')
  <div class="row center">
    <div class="col s12 m8 offset-m2 ">
      <div class="card grey lighten-5">
        <div class="card-content black-text">
        <i class="large material-icons center">account_circle</i>
          <span class="card-title">Registro</span>
          <br>
  <div class="row">
    <form class="col s12" method="post" action="{{url('registro.usuario')}}">
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
        <div class="input-field col s12">
          <input id="Fecha de nacimiento" name="nacimiento" type="text" class="datepicker">
          <label for="Fecha de nacimiento">Fecha de nacimiento</label>
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
      

      
      <div class="row">
      	<div class="input-field col s2 offset-m2">
          <label>Sexo</label>
        </div>
        <div class="input-field col s3">
        	<label>
                <input  type="radio" name="sexo" value="Masculino" />
                <span>Masculino</span>
            </label>
        </div>
        <div class="input-field col s2">
        	<label>
                <input  type="radio" name="sexo" />
                <span>Femenino</span>
            </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">E-mail</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="contrasena" class="validate">
          <label for="password">Contraseña</label>
        </div>
      </div>
<button type="submit" class="black btn">Registrar</button>

    </form>

  </div>
    <br>
    <br>
   




      </div>
    </div>
  </div>
</div>
    @endsection
    @section('js')
    <script type="text/javascript">
      $(document).ready(function(){
        $('.datepicker').datepicker({
          format:'yyyy-mm-dd',
          i18n: {
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"],
                cancel:  'Cancelar',
                clear:   'Limpiar',
                done:  'Listo'
              },
          showClearBtn: true,
          yearRange:[1970,2000],

        });
    });
    </script>
    @endsection