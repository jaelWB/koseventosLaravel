@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">CREAR NUEVO MICRONOTICIERO</h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a type="button" class="btn btn-warning btn-sm" href="{{route('micronoticiero.index')}}"><i class="icofont-long-arrow-left"></i> Regresar al administrador</a>
            </div>

            <div class="col-12 p-0 mt-4">
                @include('cms.micronoticieros.form',array('micronoticiero'=>$micronoticiero))
            </div>

        </div>
    </div>
@endsection