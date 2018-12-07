    @extends('base')
    @section('css')
    @endsection
    @section('nav')
    @parent
    @show
    @section('content')

  <div class="row center">
    <div class="col s12 m6 offset-m3 ">
      <div class="card grey lighten-5">
        <div class="card-content black-text">
          <i class="large material-icons center">account_circle</i>
          <span class="card-title">Ingresar</span>

          <br>
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Nombre de usuario</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
      </div>
    </form>
    <a href="#" title="" class="btn black">iniciar sesion</a>
  </div>

        </div>
        <div class="card-action">
          <a href="">¿Olvidaste tu contraseña?</a>
          <a href="{{url('/registro.usuario')}}" class="btn grey">Registrate</a>
          
        </div>
      </div>
    </div>
  </div>

    @endsection
    @section('js')
    <script type="text/javascript">
    </script>
    @endsection