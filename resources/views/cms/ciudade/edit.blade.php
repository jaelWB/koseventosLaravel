@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">EDITAR CIUDAD</h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a type="button" class="btn btn-warning btn-sm" href="{{route('ciudade.index')}}"><i class="icofont-long-arrow-left"></i> Regresar</a>
            </div>

            <div class="col-12 p-0 mt-4">
                @include('cms.ciudade.form',array('ciudade'=>$ciudade))
            </div>

        </div>
    </div>
@endsection