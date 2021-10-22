@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-12">
           <h2><b>Exportar a excel los usuarios registrados en los eventos</b></h2>
           <hr>
       </div>

       @if (!empty($todosEventos))
           @foreach ($todosEventos as $item)
               <div class="col-2 text-center border border bg-light p-2 py-2 text-dark">
                    <a href="{{route('home.reportesexportar',$item->id)}}" class="click-reporte text-dark">
                        <i class="icofont-file-excel mb-3" style="font-size: 40px"></i>
                        <h6 class="mt-3 mb-0"><b>{{$item->nombre}}</b></h6>
                        {{-- <h6 class="text-primary">{{$item->inicio}} / {{$item->fin}}</h6> --}}
                        <p class="mb-0 pb-0">Descargar</p>
                   </a>
               </div>
           @endforeach
       @endif

   </div>
</div>
@endsection
