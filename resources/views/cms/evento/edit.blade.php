@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">EDITAR EVENTO</h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a type="button" class="btn btn-warning btn-sm" href="{{route('evento.index')}}"><i class="icofont-long-arrow-left"></i> Regresar al administrador</a>
                
            </div>

            <div class="col-12 p-0 mt-4">
                @include('cms.evento.form',array('evento'=>$evento,'categorias'=>$categorias))
            </div>

        </div>
    </div>
@endsection