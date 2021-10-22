@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">ADMINISTRADOR DE MICRONOTICIEROS</h1>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('micronoticiero.create')}}" class="btn btn-primary"><i class="icofont-plus"></i> Agregar nuevo</a>
            </div>
        </div>
    </div>

  

    <div class="container-fluid mt-4">
        
        {{-- TABLA DE CONTENIDO --}}
        @if (session('status'))
            <div class="alert alert-info">{{session('status')}}</div>
        @endif
    
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-hover bg table-striped">
                    <thead>
                        <tr  class="bg-primary text-white">
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$model->isEmpty())
                            @php
                                $cont =1;
                            @endphp
                            @foreach ($model as $item)
                                
                                <tr>
                                    <th scope="row">{{$cont++}}</th>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->estado}}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="Editar micronoticiero: {{$item->descripcion}}" href="{{route('micronoticiero.edit',$item)}}" class="btn btn-warning btn-sm"><i class="icofont-edit"></i>  </a>
                                    </td>
                                </tr>
                            @endforeach


                        {{-- EN CASO DE QUE NO EXISTAN REGISTROS  --}}
                        @else
                            <tr>
                                <td colspan='4' class="border">No existen registros.</td>
                            </tr>
                        @endif
                        {{-- FIN DE EN CASO DE QUE NO EXISTAN REGISTROS  --}}

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- FIN DE LA TABLA DE CONTENIDO --}}

@endsection