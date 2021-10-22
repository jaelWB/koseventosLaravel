@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">ADMINISTRADOR DE EVENTOS</h1>
    <hr>

    <div class="container">
        <div class="row ">
            <div class="col-12  mx-0 px-0">
                <a href="{{route('evento.create')}}" class="btn btn-primary"><i class="icofont-plus"></i> CREAR EVENTO</a>
            </div>
        </div>
    </div>

  

    <div class="container-fluid mt-4">
        
        {{-- TABLA DE CONTENIDO --}}
        @if (session('status'))
            <div class="alert alert-info">{{session('status')}}</div>
        @endif
    
        <div class="row m-0 p-0">
            <div class="col-12 my-3 p-0">
                    <input type="text" id='txtbuscar' placeholder="Ingresa lo que deseas buscar" class="form-control">
                </div>
            <div class="col-12 m-0 p-0">
                <table class="table table-bordered table-hover bg table-striped">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th scope="col" width='2%'>#</th>
                            <th scope="col" width='25%'>Nombre</th>
                            <th scope="col" width='10%'>Categoría</th>
                            <th scope="col" width='9%'>Modalidad</th>
                            <th scope="col" width='5%'>Inscripción</th>
                            <th scope="col">Estado</th>
                            <th scope="col">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                     <tbody id="tablaC">
                        @if (!$model->isEmpty())
                            @php
                                $cont =1;
                            @endphp
                            @foreach ($model as $item)
                                
                                <tr>
                                    <th scope="row" class="text-center">{{$cont++}}</th>
                                    <td>{{mb_strtoupper($item->nombre)}}</td>
                                    <td>{{mb_strtoupper($item->categoria->descripcion)}}</td>
                                    <td class="text-center">{{$item->modalidad}}</td>
                                    <td class="text-center">{{$item->inscripcion}}</td>
                                    <td class="text-center">{{$item->estado}}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('evento.edit',$item)}}" class="btn btn-warning btn-sm mb-2"><i class="icofont-edit"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Eliminar elemento" onclick = "if (! confirm('¿Estás seguro que deseas eliminar? Es probable que esta información deje de aparecer para los usuarios')) { return false; }" 
                                             href="{{route('evento.eliminar',$item)}}" class="btn btn-danger btn-sm mb-2"><i class="icofont-trash"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Administrar Objetivos" href="{{route('objetivo.index',$item)}}" class="btn btn-primary btn-sm mb-2"><i class="icofont-notebook"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Administrar logotipos" href="{{route('logo.index',$item)}}" class="btn btn-primary btn-sm mb-2"><i class="icofont-image"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Administrar Grupos de interes" href="{{route('conferencia.index',$item)}}" class="btn btn-primary btn-sm mb-2"><i class="icofont-listing-box"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Administrar Expositores" href="{{route('expositore.index',$item)}}" class="btn btn-primary btn-sm mb-2"><i class="icofont-unique-idea"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Ciudades del evento" href="{{route('evento.ciudades',$item)}}" class="btn btn-primary btn-sm mb-2"><i class="icofont-map"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Campos para el formulario" href="{{route('evento.formulario',$item)}}" class="btn btn-primary btn-sm mb-2"><i class="icofont-listine-dots"></i> </a><br>
                                        <a data-toggle="tooltip" data-placement="top" title="Configuración de Evento en VIVO" href="{{route('publicidad.index',$item)}}" class="btn btn-outline-danger btn-sm mb-2"><i class="icofont-ui-video-chat"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Publicidad del evento en VIVO" href="{{route('online.index',$item)}}" class="btn btn-outline-danger btn-sm mb-2"><i class="icofont-megaphone"></i> </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Reporte de quienes ingresaron a este en VIVO" href="{{route('online.verIngresos',$item)}}" class="btn btn-danger btn-sm mb-2"><i class="icofont-file-excel"></i> </a>
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