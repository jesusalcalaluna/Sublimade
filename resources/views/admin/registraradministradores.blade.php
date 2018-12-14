@extends('admin.base')

@section('css')

@endsection
@section('nav')
    @parent
@show
@section('slider')

  <div class="container">

	<div class="row left ">
<div class="" style="margin-top: 50px;">
        <div class="">
            <table class="table striped">
                <thead>
                <tr>
                    <th>Usuarios</th>
                    <th>Tipo de Usuario</th>
                  
                </tr>
                </thead>
                <tbody  id="disenos" style="color: black;" >
                @foreach ($usuarios as $u)
                    <tr>
                        <td id="">{{$u->e_mail}}</td>
                        <td id="">{{$u->tipo_usuario}}</td>
                    </tr>
                @endforeach
                </tbody>
               </table>
               </div>
               </div>
  
    </div>
      <div class="row rigth " style="">
      <form  class="input-field right" style="" method="post" action="{{url('regadmin')}}">
      {{csrf_field()}}

      <div class="">
         <div class="">
          Otorgar privilegios de administrador:
          <div class="input-field inline">
            <input name="nombre" id="email_inline" type="email" class="validate">
            <label for="email_inline">Email</label>
            <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
          </div>
          <button class="black btn" type="submit" >Enviar</button>
        </div>
        </form>
        </div>



@endsection

@section('content')

@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){
            $("#email").click(function(){
                // #ListaAlumnos.html("");
                
                var token=$("input[name=_token]").val();
                $.ajax({
                    url:"/regadmin",
                    // en data se envían los datos
                    //en este caso se envía un objeto con una propiedad nombre, cuyo valor es: jorge
                    //data:{Alumno:{nombre:$("input[name=nombre]").val()},_token:token},
                    data:{Alumno:{nombre:$("input[name=tipo]").val()},_token:token},
                    
                    type:"get",
                    dataType:'json',

                    success:function (response) {
                       
                        var li="";
                        var lista=$("#listaAlumnos");
                       
                        lista.html("");
                        $.each(response, function(i,r){
                            li='<tr><td>'+r.nombre+'</td></tr>';
                             lista.append(li);
                        });

                        console.log($nombre);
                       
                    }
                })
            })
</script>

@endsection