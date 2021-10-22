@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-4">
            <h3><b class="text-primary">Evento: {{$evento->nombre}}</b></h3>
        </div>
        
        <div class="col-12 mb-3">
                <input type="text" id='txtbuscar' placeholder="Ingresa lo que deseas buscar" class="form-control">
        </div>


        <div class="col-12">
                <table class="table table-bordered table-hover bg table-striped">
                    <thead class="thead-dark">
                        <tr>
                             <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Correo</th>

                            @if (!empty($formulario))
                                @if ($formulario->pais ==1)
                                    <th scope="col">País</th>
                                @endif

                                 @if ($formulario->cedula ==1)
                                    <th scope="col">Cédula</th>
                                @endif

                                 @if ($formulario->empresa ==1)
                                    <th scope="col">Empresa</th>
                                @endif

                                 @if ($formulario->celular ==1)
                                    <th scope="col">Celular</th>
                                @endif

                                 @if ($formulario->cargo ==1)
                                    <th scope="col">Cargo</th>
                                @endif

                                 @if ($formulario->email ==1)
                                    <th scope="col">Email</th>
                                @endif

                                @if ($formulario->direccion ==1)
                                    <th scope="col">Dirección</th>
                                @endif

                                @if ($formulario->ciudad ==1)
                                    <th scope="col">Ciudad</th>
                                @endif
                                @if ($formulario->titulo ==1)
                                    <th scope="col">titulo</th>
                                @endif
                                @if ($formulario->universidad ==1)
                                    <th scope="col">Universidad</th>
                                @endif
                                 @if ($formulario->nacimiento ==1)
                                    <th scope="col">Nacimiento</th>
                                @endif
                                    
                               
                            @endif

                            <th scope="col">Asistió</th>


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
                                    <td>{{mb_strtoupper($item->nombre)}}</td>
                                    <td>{{mb_strtoupper($item->apellidos)}}</td>
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


                                    @if (!empty($item->pais))
                                         <td>{{$item->pais}}</td>
                                    @endif

                                    @if (!empty($item->cedula))
                                        <td>{{$item->cedula}}</td>

                                    @endif

                                    @if (!empty($item->empresa))
                                        <td>{{$item->empresa}}</td>

                                    @endif

                                    @if (!empty($item->celular ))
                                        <td>{{$item->celular}}</td>

                                    @endif

                                    @if (!empty($item->cargo))
                                        <td>{{$item->cargo}}</td>
                                    @endif

                                    @if (!empty($item->email))
                                        <td>{{$item->email}}</td>
                                    @endif

                                    @if (!empty($item->direccion))
                                        <td>{{$item->direccion}}</td>
                                    @endif

                                    @if (!empty($item->ciudad))
                                        <td>{{$item->ciudad}}</td>
                                    @endif
                                    @if (!empty($item->titulo))
                                        <td>{{$item->titulo}}</td>
                                    @endif
                                    @if (!empty($item->universidad))
                                        <td>{{$item->universidad}}</td>
                                    @endif
                                    @if (!empty($item->nacimiento))
                                        <td>{{$item->nacimiento}}</td>
                                    @endif
                                    
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          
                                            <label class="btn btn-outline-success">
                                                <input data-ulr='{{route('home.salvarlead',array('lead'=>$item->id,'opcion'=>'SI'))}}' {{$item->asistio!=''?'checked':''}} type="radio" class="asistecj" name="options" id="option2" autocomplete="off"> SI
                                            </label>
                                            <label class="btn btn-outline-danger">
                                                <input data-ulr='{{route('home.salvarlead',array('lead'=>$item->id,'opcion'=>'NO'))}}' type="radio" class="asistecj" name="options" id="option3" autocomplete="off"> No
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        {{-- EN CASO DE QUE NO EXISTAN REGISTROS  --}}
                        @else
                            <tr>
                                <td colspan='12' class="border">No existen registros.</td>
                            </tr>
                        @endif
                        {{-- FIN DE EN CASO DE QUE NO EXISTAN REGISTROS  --}}

                        
                    </tbody>
                </table>
            </div>

    </div>
</div>
@endsection
