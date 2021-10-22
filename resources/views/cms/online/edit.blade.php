@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">EDITAR EVENTO EN VIVO: <b>{{$evento->nombre}}</b></h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a href="{{route('evento.index')}}" class="btn btn-warning btn-sm border"><i class="icofont-arrow-left"></i> Regresar a eventos</a>

            </div>

            <div class="col-12 p-0 mt-4">
                  {{-- TABLA DE CONTENIDO --}}
                @if (session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif

                @include('cms.online.form',array('online'=>$online,'evento'=>$evento))
                
            </div>

        </div>
    </div>
@endsection