<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{csrf_token()}}"/>


  <!----------------------------------------LINKS ICONS - FONTS----------------------------------------->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


  <!---------------------------------------------LINKS CSS LOCAL----------------------------------------->
  <link href="css/materialize/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href={{url('/css/dropzone/dropzone.css')}}>

  <!---------------------------------------------- CDN CSS ------------------------------------>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <!---------------------------------------------- Sweetalert ------------------------------------>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>



  @yield('css')
  <style type="text/css">
  .carousel .indicators .indicator-item{
    width: 12px;
    height: 12px;
    background-color: rgba(36, 34, 34, 0.55);

  }

  .carousel .indicators .indicator-item.active{
    background-color: black;
  }
   .input-field label {
     color: #000;
   }
   .drop-usuario {
  display: none;
  min-width: 250px; /* Changed this to accomodate content width */
  max-height: 500px;
  margin-left: -1px; /* Add this to keep dropdown in line with edge of navbar */
  overflow: hidden; /* Changed this from overflow-y:auto; to overflow:hidden; */
  opacity: 0;
  position: absolute;
  white-space: nowrap;
  z-index: 1;
  will-change: width, height;
}
       .datepicker-date-display, .datepicker-table td.is-selected {
        background-color:black;
       }
       .active,.dropdown-content li > a, .dropdown-content li > span,.datepicker-cancel, .datepicker-clear, .datepicker-today, .datepicker-done{
        color: black;
        border-bottom-color: black;
       }

       input:not([type]), input[type="text"]:not(.browser-default):focus:not([readonly]), input[type="password"]:not(.browser-default):focus:not([readonly]), input[type="email"]:not(.browser-default):focus:not([readonly]), input[type="url"]:not(.browser-default):focus:not([readonly]), input[type="time"]:not(.browser-default):focus:not([readonly]), input[type="date"]:not(.browser-default):focus:not([readonly]), input[type="datetime"]:not(.browser-default):focus:not([readonly]), input[type="datetime-local"]:not(.browser-default):focus:not([readonly]), input[type="tel"]:not(.browser-default):focus:not([readonly]), input[type="number"]:not(.browser-default):focus:not([readonly]), input[type="search"]:not(.browser-default):focus:not([readonly]), textarea.materialize-textarea{
        color: black;
        box-shadow:0 1px 0 0 black;
        border-bottom-color:black;

       }
       input:not([type]):focus:not([readonly]) + label, input[type="text"]:not(.browser-default):focus:not([readonly]) + label, input[type="password"]:not(.browser-default):focus:not([readonly]) + label, input[type="email"]:not(.browser-default):focus:not([readonly]) + label, input[type="url"]:not(.browser-default):focus:not([readonly]) + label, input[type="time"]:not(.browser-default):focus:not([readonly]) + label, input[type="date"]:not(.browser-default):focus:not([readonly]) + label, input[type="datetime"]:not(.browser-default):focus:not([readonly]) + label, input[type="datetime-local"]:not(.browser-default):focus:not([readonly]) + label, input[type="tel"]:not(.browser-default):focus:not([readonly]) + label, input[type="number"]:not(.browser-default):focus:not([readonly]) + label, input[type="search"]:not(.browser-default):focus:not([readonly]) + label, textarea.materialize-textarea.validate + label,.input-field .prefix.active{
        color: black;
       }
       [type="radio"]:checked + span::after, [type="radio"].with-gap:checked + span::after{
        background-color: black;
       }
       [type="radio"]:checked + span::after, [type="radio"].with-gap:checked + span::before, [type="radio"].with-gap:checked + span::after{
        border: 2px solid black;
       }
  </style>

  <title>Sublimade Fashion</title>
</head>
<body>
  @section('nav')

  <nav class="blue-grey ">
    <div class="nav-wrapper">
      <a href="{{url('/')}}" style="font-size: 30px; font-family: Georgia">Sublimade</a>
      <a class="black btn" style="margin-left: 10px; margin-top: -10px" href="{{'/'}}">Cliente</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>

      <ul class="right hide-on-med-and-down">
      @if (Session::has('tipo'))
      <li><a>{{Session::get('nombre')}}</a></li>
      @endif
      @if(Session()->get('tipo')==null)
        <li><a href="{{url('/inicio.sesion')}}">Iniciar Sesion</a></li>
         @endif
      @if (Session::has('tipo'))
        <li><a class='dropdown-trigger'  data-target='dropdown1' data-activates="dropdown" data-beloworigin="true"><i class="material-icons center">account_circle</i></a></li>
      @endif
      </ul>
    </div>
  </nav>
<!------------------------------------ DROPDOWN USUARIO ----------------------------------------->
<ul id="dropdown1" class="dropdown-content drop-usuario" tabindex="0" data-activates="dropdown" data-beloworigin="true">
    <li tabindex="0"><a href="#!" class="black-text center"><i class="material-icons right">shopping_cart</i>Carrito</a></li>
    <li class="divider" tabindex="-1"></li>
    <li tabindex="0"><a href="#!" class="black-text center"><i class="material-icons right">settings</i>Opciones</a></li>
        <li tabindex="0"><a href="{{url('cerrar')}}" class="black-text center"><i class="material-icons right">close</i>Cerrar sesión</a></li>
  </ul>

<!------------------------------------ SIDEVAR----------------------------------------->
<div class="sidenav grey lighten-5" id="mobile-demo" id="mobile-de">

  <nav>
    <div class="nav-wrapper blue-grey">
      <a href="{{url('/')}}" style="font-size: 30px; font-family: Georgia">Sublimade</a>
      <a href="#" data-dismis="mobile-de" class="sidenav-trigger sidenav-close show-on-large"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <ul class="collapsible collapsible-accordion">
    <br>
    <li>
      <div class="collapsible-header">PEDIDOS</div>
        <ul class="collapsible-body">
          <li><a href="{{url('/pedidospen')}}">Pendientes</a></li>
          <li><a href="{{url('/pedidospro')}}">En proceso</a></li>
          <li><a href="{{url('/pedidosfin')}}">Finalizados</a></li>

        </ul>
    </li>
    <br>
    <li class="divider" tabindex="-1"></li>
    <br>
    <li><a href="{{url('/verdisenos')}}">DISEÑOS</a></li>
    <br>
    <li class="divider" tabindex="-1"></li>
    <br>
    <li><a href="#">VENTAS</a></li>
    <br>
    <li class="divider" tabindex="-1"></li>
    <br>
    <li><a href="{{url('regadmin')}}">OTORGAR PERMISOS ADMI</a></li>
    <br>
    <li class="divider" tabindex="-1"></li>
    <br>
    <li><a href="#">ADMINISTRADORES</a></li>
    <br>
    <li class="divider" tabindex="-1"></li>

  </ul>
</div>
  @show
<!------------------------------------------------------------------------------------->
  @yield('slider')

  <div class="container">
  @yield('content')
  </div>
  @yield('catalogo')


    <script src="js/jquery-3.3.1.min.js"></script>
  <script src="{{url('/js/jquery.easy-autocomplete.js')}}"></script>
    <script src="js/materialize/materialize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="{{url('/js/dropzone/dropzone.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/combine/npm/sweetalert2@7.32.2/src/enhancers/withGlobalDefaults.min.js,npm/sweetalert2@7.32.2"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.2/src/enhancers/withGlobalDefaults.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.2/dist/sweetalert2.all.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
  @yield('js')
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  $(document).ready(function(){
    $('.sidenav').sidenav();

    $('.collapsible').collapsible();
    $('.fixed-action-btn').floatingActionButton();
    $('.dropdown-trigger').dropdown({
      inDuration: 300,
      outDuration: 225,
      hover: true, // Activate on hover
      coverTrigger: false, // Displays dropdown below the button
      alignment: 'right' // Displays dropdown with edge aligned to the left of button
    });
  });
</script>
    @include('sweet::alert')


</body>
</html>
