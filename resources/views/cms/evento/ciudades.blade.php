@extends('layouts.app')
@section('content')
<h1 class="titulo-index">ADMINISTRA LAS CIUDADES DEL EVENTO: <b>{{$evento->nombre}}</b></h1>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('evento.index')}}" class="btn btn-warning btn-sm border"><i class="icofont-arrow-left"></i> Regresar a eventos</a>
            </div>
        </div>
    </div>

  

    <div class="container-fluid mt-4">
        
        {{-- FORMULARIO  --}}
                <form action="{{route('evento.ciudadessave')}}" method="POST">
                    @csrf
                    <div class="row bg-white p-3 mb-3">

                        <div class="col-4">
                            <label for=""><b>Ciudad*:</b></label>
                            <select name="ciudades_id" id="ciudades_id" required class="form-control">
                                <option value="">-- Selecciona una ciudad --</option>
                                @if (!$ciudades->isEmpty())
                                    @foreach ($ciudades as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach 
                                @endif

                            </select>
                        </div>
                        <div class="col-4">
                            <label for=""><b>Fecha*:</b></label>
                            <input type="text" autocomplete="false" value="{{date('Y-m-d')}}" readonly class="form-control fechas" name="fecha" id="fecha">
                        </div>

                        <div class="col-4">
                            <label for=""><b>Fecha hasta *:</b></label>
                            <input type="text" autocomplete="false" value="{{date('Y-m-d')}}" readonly class="form-control fechas" name="fecha_fin" id="fecha_fin">
                        </div>

                        <div class="col-4 mt-2">
                            <label for=""><b>Hora de inicio* :</b></label>
                            <input type="time" autocomplete="false" value="" required class="form-control" name="timer" id="timer">
                        </div>

                         <div class="col-4 mt-2">
                            <label for=""><b>Hora descripcion :</b></label>
                            <input type="text" autocomplete="false" value="" placeholder="Ej: 08H30 A 17H30"  class="form-control" name="hora" id="hora">
                        </div>

                         <div class="col-4 mt-2">
                            <label for=""><b>Fecha descripcion :</b></label>
                            <input type="text" autocomplete="false" value="" placeholder="Ej: 01 AL 31 DE DICIEMBRE"  class="form-control" name="fecha_descriptiva" id="fecha_descriptiva">
                        </div>

                         <div class="col-4 mt-2">
                            <label for=""><b>Orden</b></label>
                            <input type="number" autocomplete="false" value="" required class="form-control" name="orden" id="orden">
                        </div>
                        

                        <div class="col-4 text-left mt-4">
                            <input type="hidden" name="eventos_id" value="{{$evento->id}}">
                            <input type="submit" value="Enviar datos" class="mt-1 btn btn-primary">
                        </div>
                     </div>


                </form>

        {{-- FORMULARIO  --}}

        {{-- TABLA DE CONTENIDO --}}
        @if (session('status'))
            <div class="alert alert-info">{{session('status')}}</div>
        @endif
    
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-hover bg table-striped">
                    <thead >
                        <tr class="bg-primary text-white">
                            <th scope="col">#</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Fecha fin</th>
                            <th scope="col">Hora de inicio</th>
                            <th scope="col">Jornada</th>
                            <th scope="col">Fecha Des</th>
                            <th scope="col">Orden</th>
                            <th scope="col">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$misciudades->isEmpty())
                            @php
                                $cont =1;
                            @endphp
                            @foreach ($misciudades as $item)
                                
                                <tr>
                                    <th scope="row">{{$cont++}}</th>
                                    <td>{{$item->ciudad->nombre}}</td>
                                    <td>{{$item->fecha}}</td>
                                    <td>{{$item->fecha_fin}}</td>
                                    <td>{{$item->timer}}</td>
                                    <td>{{$item->hora}}</td>
                                    <td>{{$item->fecha_descriptiva}}</td>
                                    <td>{{$item->orden}}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="Eliminar elemento" onclick = "if (! confirm('¿Estás seguro que deseas eliminar? Es probable que esta información deje de aparecer para los usuarios')) { return false; }" 
                                             href="{{route('evento.ciudadeseliminar',$item)}}" class="btn btn-danger btn-sm"><i class="icofont-trash"></i> </a>
                                        
                                    </td>
                                </tr>
                            @endforeach


                        {{-- EN CASO DE QUE NO EXISTAN REGISTROS  --}}
                        @else
                            <tr>
                                <td colspan='14' class="border">No existen registros.</td>
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