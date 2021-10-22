@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">EDITAR CATEGORÍA</h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a type="button" class="btn btn-warning btn-sm" href="{{route('categoria.index')}}"><i class="icofont-long-arrow-left"></i> Regresar</a>
            </div>

            <div class="col-12 p-0 mt-4">
                @include('cms.categorias.form',array('categoria'=>$categoria))
            </div>

        </div>
    </div>
@endsection