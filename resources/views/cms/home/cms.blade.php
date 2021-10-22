@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-4">
            <h3><b>Resumen general</b></h3>
        </div>
        <div class="col-4 bg-success p-3">
            <h5 class="text-center">Eventos  Creados</h5>
            <h1 class="text-center"><b>{{$eventosA}}</b></h1>
        </div>
        <div class="col-4 bg-warning p-3">
            <h5 class="text-center">Eventos Inactivos</h5>
            <h1 class="text-center"><b>{{$eventosI}}</b></h1>

        </div>
        <div class="col-4 bg-light border p-3">
            <h5 class="text-center">Usuarios Registrados</h5>
            <h1 class="text-center"><b>{{$incripciones}}</b></h1>

        </div>
         <div class="col-12 mt-4">
            <h5><b>Detalles de eventos generales</b></h5>
            <hr>
        </div>
        <div class="col-6">
            <form>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Evento</label>
                    <div class="col-sm-10">
                        <select name="eventocbo" id="eventocbossss" class="form-control">
                            @if (!$todosEventos->isEmpty())
                                @php
                                $slt = '';        
                                @endphp
                                @foreach ($todosEventos as $item)
                                   @php
                                       if($item->id ==  $ultimoEvento->id){
                                          $slt = 'selected';      
                                       }else{
                                           $slt = '';     
                                       }
                                       
                                   @endphp
                                    <option {{$slt}} value="{{$item->id}}">{{$item->nombre}}</option>
                                @endforeach
                            @else
                                <option value="">-- No existen eventos creados. --</option>
                            @endif
                        </select>
                    <input type="hidden" id="urlG" value="{{route('cms')}}">
                    </div>
                </div>

            </form>
        </div>
        <div class="col-4">
                <input type="text" id='txtbuscar' placeholder="Ingresa lo que deseas buscar" class="form-control">
        </div>

        <div class="col-2">
                <h3 class="mt-1">Total: <b class="text-primary">{{$datosUltimoC}}</b></h3> 
        </div>


        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-border table-hover bg table-striped">
                    <thead class="thead-dark">
                        <tr>
                             <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Email</th>
                            <th scope="col">Cédula</th>
                            <th scope="col">Celular</th>
                               
                                    
                               

                        </tr>
                    </thead>
                    <tbody  id="tablaC">
                        @if (!$model->isEmpty())
                            @php
                                $cont =1;
                            @endphp
                            @foreach ($model as $item)
                                
                                <tr>
                                    <th scope="row">{{$cont++}}</th>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->apellidos}}</td>
                                    <td>
                                        @php

                                            
                                            $casillas = App\Ciudade::where('id',$item->ubicacion)->first();
                                            if(!empty($casillas)){
                                                echo $casillas->nombre;
                                            }else{
                                                echo '--';
                                            }
                                            
                                        @endphp
   
                                        
                                    </td>
                                        <td>{{($item->ciudad)?$item->ciudad:'--'}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{($item->cedula)?$item->cedula:'--'}}</td>
                                        <td>{{($item->celular)?$item->celular:'--'}}</td>




                                    
                                    
                                </tr>
                            @endforeach


                        {{-- EN CASO DE QUE NO EXISTAN REGISTROS  --}}
                        @else
                            <tr>
                                <td colspan='19' class="border">No existen registros.</td>
                            </tr>
                        @endif
                        {{-- FIN DE EN CASO DE QUE NO EXISTAN REGISTROS  --}}

                        
                    </tbody>
                </table>
            </div>
                 {{ $model->links() }}
            </div>

    </div>
</div>
@endsection
