@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">CREAR NUEVO USUARIO ONLINE</h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a type="button" class="btn btn-warning btn-sm" href="{{route('registro.index')}}"><i class="icofont-long-arrow-left"></i> Regresar al administrador</a>
            </div>

            <div class="col-12 p-0 mt-4">
                @include('cms.registro.form',array('registro'=>$registro, 'model'=>$model))
            </div>

        </div>
    </div>
@endsection