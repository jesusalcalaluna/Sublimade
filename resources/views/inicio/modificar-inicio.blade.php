    @extends('base')
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

        <div class="carousel carousel-slider">
            <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/800/400/food/1"></a>
            <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/800/400/food/2"></a>
            <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/800/400/food/3"></a>
            <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/800/400/food/4"></a>
        </div>

<br>
<div class="divider"></div>
<div class="center">
  <h2>Destacados</h2>
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
                    <a><img src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg"></a>
                    <span class="card-title">Card Title</span>
                  </div>
                </div>
        </div>

        <div class="col s3 ">
            <div class="card hoverable">
                <div class="card-image">
                 <a><img src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg"></a>
                  <span class="card-title">Card Title</span>
                </div>
            </div>
        </div>

        <div class="col s3 ">
            <div class="card hoverable">
                <div class="card-image">
                 <a><img src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg"></a>
                  <span class="card-title">Card Title</span>
                </div>
            </div>
        </div>

        <div class="col s3 ">
            <div class="card hoverable">
                <div class="card-image">
                 <a><img src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg"></a>
                  <span class="card-title">Card Title</span>
                </div>
            </div>
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
    }, 5000);
    
  });
</script>
    @endsection