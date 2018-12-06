@extends('base')
@section('content')

    <div class="row">
        <div class="col-m8 offset-2" style="margin-top: 30px">
            <form action="/ingresardiseno" class="dropzone" id="subir-disenos">
                {{csrf_field()}}
                <div class="fallback">S
                    <input type="file" name="file">
                </div>
                <button id="btn1" class="btn btn-primary" type="submit">Ingresar</button>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script>
        Dropzone.options.subirDisenos={
            autoProcessQueue: false,
            autoDiscover: false,
            init: function () {
                var subirDisenos=this;

                $("#btn1").click(function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    subirDisenos.processQueue();
                });
                subirDisenos.on("complete", function(file) {
                    subirDisenos.removeFile(file);
                });
            }
        }

    </script>
    @endsection