    @extends('base')
    @section('css')
    @endsection
    @section('nav')
    @parent
    @show
    @section('catalogo')
<div class="row">
  <div class="col s8 offset-s2 center">
    <div class="section">
      <h4>CATALOGO</h4>
    </div>
    <div class="divider"></div>
  </div>

  
</div>
   <div class="row">
    <div class="col s10">

      <div class="col s3 ">
                        <div class="card z-depth-3">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4">Playera Chida</span>
                                <p style="color: #dd0007;">Precio: MXN$200</p>
                            </div>
                            <div class="card-action">
                                <form action="detalles" method="post">
                                    {{csrf_field()}}
                                    <input id="id" name="id" class="hide" type="text" value="">
                                    <button  type="submit" class="btn center-block waves-effect waves-block grey darken-4 z-depth-3">
                                        Ver detalles
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col s3 ">
                        <div class="card z-depth-3">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4">Playera Chida</span>
                                <p style="color: #dd0007;">Precio: MXN$200</p>
                            </div>
                            <div class="card-action">
                                <form action="detalles" method="post">
                                    {{csrf_field()}}
                                    <input id="id" name="id" class="hide" type="text" value="">
                                    <button  type="submit" class="btn center-block waves-effect waves-block grey darken-4 z-depth-3">
                                        Ver detalles
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col s3 ">
                        <div class="card z-depth-3">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4">Playera Chida</span>
                                <p style="color: #dd0007;">Precio: MXN$200</p>
                            </div>
                            <div class="card-action">
                                <form action="detalles" method="post">
                                    {{csrf_field()}}
                                    <input id="id" name="id" class="hide" type="text" value="">
                                    <button  type="submit" class="btn center-block waves-effect waves-block grey darken-4 z-depth-3">
                                        Ver detalles
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col s3 ">
                        <div class="card z-depth-3">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4">Playera Chida</span>
                                <p style="color: #dd0007;">Precio: MXN$200</p>
                            </div>
                            <div class="card-action">
                                <form action="detalles" method="post">
                                    {{csrf_field()}}
                                    <input id="id" name="id" class="hide" type="text" value="">
                                    <button  type="submit" class="btn center-block waves-effect waves-block grey darken-4 z-depth-3">
                                        Ver detalles
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col s3 ">
                        <div class="card z-depth-3">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/b2e710b796a3d96a1482b705198941642c88f124.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4">Playera Chida</span>
                                <p style="color: #dd0007;">Precio: MXN$200</p>
                            </div>
                            <div class="card-action">
                                <form action="detalles" method="post">
                                    {{csrf_field()}}
                                    <input id="id" name="id" class="hide" type="text" value="">
                                    <button  type="submit" class="btn center-block waves-effect waves-block grey darken-4 z-depth-3">
                                        Ver detalles
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>











    </div>
    <!-- FILTROS -->
    <div class="col s2">
      <div class="section center">
        <h5>FILTRO</h5>
      </div>
      <div class="divider"></div>
      <div class="section">
        <h5>Sexo</h5>
        <p>
          <form action="#">
            <p>
              <label>
                <input name="group1" type="radio" checked />
                <span>Todo</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Mujer</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio"  />
                <span>Hombre</span>
              </label>
            </p>
          </form>
        </p>
      </div>
      <div class="divider"></div>
      <div class="section">
        <h5>Productos</h5>
        <p>
          <form action="#">
            <p>
              <label>
                <input name="group1" type="radio" checked />
                <span>Todo</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Sudaderas</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Playeras</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Camisas</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Blusas</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Sueters</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Chamarras</span>
              </label>
            </p>
          </form>
        </p>
      </div>
      <div class="divider"></div>
      <div class="section">
        <h5>Categoria</h5>
        <p>
          <form action="#">
            <p>
              <label>
                <input name="group1" type="radio" checked />
                <span>Todo</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Peliculas</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Caricaturas</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Gatos</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Perros</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" />
                <span>Amor</span>
              </label>
            </p>
          </form>
        </p>
      </div>
    </div>
  </div>
    @endsection
    @section('js')
    <script type="text/javascript">

  // Or with jQuery
    </script>
    @endsection