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
                        <td class="email" value="{{$u->e_mail}}">{{$u->e_mail}}</td>
                        <td id="">Cliente</td>
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
            <input name="nombre" id="email_inline" type="email" class="validate" placeholder="" value="">
            <label for="email_inline">Email</label>
            <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
          </div>
          <button class="black btn " type="submit" >Enviar</button>
        </div>
        </form>
        </div>
<!--div class="col s4 offset-s1 input-field">
        <input type="text" id="autocompletado" class="validate" name="diseno">
        <br> <br!-->


@endsection

@section('content')

@endsection
@section('js')
    <script>
 

        $(document).ready(function(){
         $(".email").click(function () {
               $("input[name=nombre]").val($(this).html());
               
            })
          
        });

</script>
<script>
        $(document).ready(function(){
           
            var options = {
                url: "getadmins",

                getValue: "nombre",

                placeholder:"Buscar un diseño",

                list: {
                    showAnimation: {
                        type: "fade", //normal|slide|fade
                        time: 400,
                        callback: function() {}
                    },
                    hideAnimation: {
                        type: "slide", //normal|slide|fade
                        time: 400,
                        callback: function() {}
                    },
                    onChooseEvent: function() {
                        var token=$("input[name=_token]").val();

                        $.ajax({
                            url:"/filtroadmin",
                            // en data se envían los datos
                            data:{nombre:$("input[name=diseno]").val(),_token:token},
                            type:"post",
                            dataType:'json',
                            success:function (response) {
                                // alert("sss");
                                var cont="";
                                var nombres = $("#disenos");
                                nombres.empty();
                                $.each(response, function(i,r){
                                cont+='<tr><td>'+r.e_mail+'</td><td>'        
                              });
                                nombres.append(cont);

                            }
                        })
                    },

                    match: {
                        enabled: true
                    }
                }
            };
             $("#autocompletado").easyAutocomplete(options);
</script>

@endsection