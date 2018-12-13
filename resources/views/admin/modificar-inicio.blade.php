    @extends('admin.base')

    @section('css')
    <style type="text/css">
      .carousel{
        height: 500px;
      }
       .datepicker-date-display, .datepicker-table td.is-selected {
        background-color:black;

       }
       .datepicker-cancel, .datepicker-clear, .datepicker-today, .datepicker-done{
        color: black;
       }

    </style>
    
    @endsection
    @section('nav')
    @parent
    @show
    @section('slider')

        <div class="carousel carousel-slider" id="carrusel">
            <a class="carousel-item"><img src="{{url('storage/Inicio/slider1.png')}}"></a>
            <a class="carousel-item"><img src="{{url('storage/Inicio/slider2.png')}}"></a>
            <a class="carousel-item"><img src="{{url('storage/Inicio/slider3.png')}}"></a>
            <a class="carousel-item"><img src="{{url('storage/Inicio/slider4.png')}}"></a>
        </div>
        <br>
        <div class="row">
          <div class="col s3">
    <form action="/slider1" class="dropzone" id="my-dropzone-z">
        {{csrf_field()}}
        <div class="fallback">
            <input type="file" name="archivo">
        </div>
    </form> 
          </div>
          <div class="col s3">
    <form action="/slider2" class="dropzone" id="my-dropzone">
        {{csrf_field()}}
        <div class="fallback">
            <input type="file" name="archivo">
        </div>
    </form>
          </div>
          <div class="col s3">
    <form action="/slider3" class="dropzone" id="my-dropzone">
        {{csrf_field()}}
        <div class="fallback">
            <input type="file" name="archivo">
        </div>
    </form>
          </div>
          <div class="col s3">
    <form action="/slider4" class="dropzone" id="my-dropzone">
        {{csrf_field()}}
        <div class="fallback">
            <input type="file" name="archivo">
        </div>
    </form>
          </div>
        </div>

<br>
<div class="divider"></div>
<div class="center">
    <strong><h2 style="font-size: 60px; font-family: 'Calisto MT';">Destacados</h2></strong>
</div>
<div class="divider"></div>
<br>
    @endsection


    @section('catalogo')
    <div class="row">
      <div class="col s12">
        <div class="col s3 ">
                <div class="card hoverable">
                  <div class="card-image">
                    <a><img src="{{url('storage/Inicio/destacado1.png')}}"></a>
                  </div>
                </div>
    <form action="/destacado1" class="dropzone" id="my-dropzone">
        {{csrf_field()}}
        <div class="fallback">
            <input type="file" name="archivo">
        </div>
    </form>
        </div>

        <div class="col s3 ">
            <div class="card hoverable">
                <div class="card-image">
                 <a><img src="{{url('storage/Inicio/destacado2.png')}}"></a>
                </div>
            </div>
    <form action="/destacado2" class="dropzone" id="my-dropzone">
        {{csrf_field()}}
        <div class="fallback">
            <input type="file" name="archivo">
        </div>
    </form>
        </div>
        <div class="col s3 ">
            <div class="card hoverable">
                <div class="card-image">
                 <a><img src="{{url('storage/Inicio/destacado3.png')}}"></a>
                </div>
            </div>
    <form action="/destacado3" class="dropzone" id="my-dropzone">
        {{csrf_field()}}
        <div class="fallback">
            <input type="file" name="archivo">
        </div>
    </form>
        </div>

        <div class="col s3 ">
            <div class="card hoverable">
                <div class="card-image">
                 <a><img src="{{url('storage/Inicio/destacado4.png')}}"></a>
                </div>
            </div>
    <form action="/destacado4" class="dropzone" id="my-dropzone">
        {{csrf_field()}}
        <div class="fallback">
            <input type="file" name="archivo">
        </div>
    </form>
        </div>
      </div>
    </div>
    @endsection
    @section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('.carousel').carousel({
    
    indicators: true
    });
    setInterval(function() {
    $('.carousel').carousel('next');
    }, 10000);
    
  });

  Dropzone.options.myDropzoneZ={
      uploadMultiple: false,
      autoProcessQueue: true,
      autoDiscover: false,
      paramName:"archivo",
      init: function () {
          var myDropzoneZ=this;
          myDropzoneZ.on("complete", function() {
              $.ajax({
                  url:"/actualizarini",
                  // en data se envían los datos
                  data:{},
                  type:"get",
                  dataType:'int',
                  success:function (response) {
                      var nombres = $("#carrusel");
                      nombres.empty();
                      alert("sss");
                  }
              })
          })
      }
  }




</script>
    @endsection
