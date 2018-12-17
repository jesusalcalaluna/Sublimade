@extends('admin.base')

@section('css')

@endsection
@section('nav')
    @parent
@show
@section('slider')
    <h1>Listado de usuarios</h1>
    <table class="table" style="color: black">
        <thead>
        <th>ID</th>
        <th>Esuario</th>
        <th>Edad</th>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->usuario}}</td>
                <td>{{$usuario->edad}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>

    <a href="descargar">Descargar</a>
@endsection

@section('content')

@endsection
@section('js')

@endsection