@extends('layouts.app')
@section('content')
<h1 class="titulo-index">ADMINISTRADOR DE OBJETIVOS PARA EL EVENTO: <b>{{$evento->nombre}}</b></h1>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('evento.index')}}" class="btn btn-warning btn-sm border"><i class="icofont-arrow-left"></i> Regresar a eventos</a>
                <a href="{{route('objetivo.create',$evento->id)}}" class="btn btn-primary btn-sm"><i class="icofont-plus-square"></i> Agregar nuevo</a>
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
                        <tr class="bg-primary text-white">
                            <th scope="col">#</th>
                            <th scope="col">Descripción</th>
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
                                        <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('objetivo.edit',$item)}}" class="btn btn-warning btn-sm"><i class="icofont-edit"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Eliminar elemento" onclick = "if (! confirm('¿Estás seguro que deseas eliminar? Es probable que esta información deje de aparecer para los usuarios')) { return false; }" 
                                             href="{{route('objetivo.eliminar',$item)}}" class="btn btn-danger btn-sm"><i class="icofont-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach


                        {{-- EN CASO DE QUE NO EXISTAN REGISTROS  --}}
                        @else
                            <tr>
                                <td colspan='8' class="border">No existen registros.</td>
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