@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">EDITAR CARGO</h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a type="button" class="btn btn-warning btn-sm" href="{{route('cargosestandarizado.index')}}"><i class="icofont-long-arrow-left"></i> Regresar</a>
            </div>

            <div class="col-12 p-0 mt-4">
                @include('cms.cargosestandarizados.form',array('cargosestandarizado'=>$cargosestandarizado))
            </div>

        </div>
    </div>
@endsection