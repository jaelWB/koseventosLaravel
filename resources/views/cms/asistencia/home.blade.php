@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-12">
           <h2><b>Registra las asistencias de los eventos</b></h2>
           <hr>
       </div>

       @if (!empty($todosEventos))
           @foreach ($todosEventos as $item)
               <div class="col-3 text-center border bg-light border p-2 py-4 text-dark">
                    <a href="{{route('asistenciaevento',$item->id)}}" class="click-reporte text-dark">
                        <i class="icofont-file-excel mb-3" style="font-size: 40px"></i>
                        <h6 class="mt-3"><b>{{$item->nombre}}</b></h6>
                    <h6>{{$item->inicio}} / {{$item->fin}}</h6>
                   </a>
               </div>
           @endforeach
       @endif

   </div>
</div>
@endsection
