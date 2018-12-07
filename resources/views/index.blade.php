
@extends('base')
@section('cssextra')
@endsection
@section('Contenido')

        @foreach ($project as $item)

                       <image src="{{$item->nombre_archivo}}"></image>
        @endforeach

@endsection
@section('javascript')
@endsection