@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">CREAR NUEVO CONFERENCIA PARA EL EVENTO: <b>{{$evento->nombre}}</b></h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a type="button" class="btn btn-warning btn-sm" href="{{route('conferencia.index',$evento->id)}}"><i class="icofont-long-arrow-left"></i> Regresar al administrador</a>
            </div>

            <div class="col-12 p-0 mt-4">
                @include('cms.conferencia.form',array('conferencia'=>$conferencia,'evento'=>$evento))
            </div>

        </div>
    </div>
@endsection