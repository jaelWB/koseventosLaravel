@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">EDITAR EXPOSITORES PARA EL EVENTO: <b>{{$evento->nombre}}</b></h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a type="button" class="btn btn-warning btn-sm" href="{{route('expositore.index',$evento->id)}}"><i class="icofont-long-arrow-left"></i> Regresar al administrador</a>
            </div>

            <div class="col-12 p-0 mt-4">
                @include('cms.expositore.form',array('expositore'=>$expositore,'evento'=>$evento))
                
            </div>

        </div>
    </div>
@endsection