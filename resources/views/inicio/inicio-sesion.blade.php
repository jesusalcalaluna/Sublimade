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
    <form class="col s12" method="post" action="{{url('inicio.sesion')}}">
      {{csrf_field()}}
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name="usuario">
          <label for="email">Nombre de usuario</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="contrasena">
          <label for="password">Contraseña</label>
        </div>
      </div>
      <button type="submit"  title="" class="btn grey darken-4">iniciar sesion</button>
    </form>
    
  </div>

        </div>
        <div class="card-action">
          {{--<a href="" style="color: black">¿Olvidaste tu contraseña?</a>--}}
            No tienes una cuenta?
          <a href="{{url('/registro.usuario')}}" class="btn grey darken-4">Registrate</a>
          
        </div>
      </div>
    </div>
  </div>

    @endsection
    @section('js')
    <script type="text/javascript">
                       

    </script>
    @endsection
