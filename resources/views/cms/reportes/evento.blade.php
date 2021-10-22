<h3>{{$eve->nombre}}</h3>
<h4>{{$eve->tematica}}</h4>
<br>
<table>
        <tr>
            <td scope="col">#</td>
            <td scope="col">Nombres</td>
            <td scope="col">Apellidos</td>
            <td scope="col">Ubicación</td>
            <td scope="col">Email</td>
            @if (!empty($formulario))
                @if ($formulario->pais ==1)
                    <td scope="col">País</td>
                @endif

                @if ($formulario->cedula ==1)
                    <td scope="col">Cédula</td>
                @endif

                @if ($formulario->empresa ==1)
                    <td scope="col">Empresa</td>
                @endif

                @if ($formulario->celular ==1)
                    <td scope="col">Celular</td>
                @endif

                @if ($formulario->cargo ==1)
                    <td scope="col">Cargo</td>
                @endif

                

                @if ($formulario->direccion ==1)
                    <td scope="col">Dirección</td>
                @endif

                @if ($formulario->ciudad ==1)
                    <td scope="col">Ciudad</td>
                @endif
                @if ($formulario->titulo ==1)
                    <td scope="col">titulo</td>
                @endif
                @if ($formulario->universidad ==1)
                    <td scope="col">Universidad</td>
                @endif
                
                @if ($formulario->nacimiento ==1)
                    <td scope="col">Nacimiento</td>
                @endif


                 @if ($formulario->asistencia ==1)
                    <td scope="col">Tipo de asistencia</td>
                @endif
                 @if ($formulario->telefono ==1)
                    <td scope="col">Télefono</td>
                @endif
                 @if ($formulario->genero ==1)
                    <td scope="col">Género</td>
                @endif
                 @if ($formulario->edad ==1)
                    <td scope="col">Edad</td>
                @endif
                 @if ($formulario->educacion ==1)
                    <td scope="col">Nivel de educación</td>
                @endif
                 @if ($formulario->entero ==1)
                    <td scope="col">Como se enteró</td>
                @endif
                 @if ($formulario->whatsapp ==1)
                    <td scope="col">Suscripción</td>
                @endif
                    
                <td>Asistió al evento</td>
            @endif

        </tr>
        @if (!$model->isEmpty())
            @php
                $cont =1;
            @endphp
            @foreach ($model as $item)
                
                <tr>
                    <td scope="row">{{$cont++}}</td>
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
                     @if (!empty($item->email))
                        <td>{{$item->email}}</td>
                    @endif

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

                    
                    @if (!empty($item->asistencia))
                        <td>{{$item->asistencia}}</td>
                    @endif
                    @if (!empty($item->telefono))
                        <td>{{$item->telefono}}</td>
                    @endif
                    @if (!empty($item->genero))
                        <td>{{$item->genero}}</td>
                    @endif
                    @if (!empty($item->edad))
                        <td>{{$item->edad}}</td>
                    @endif
                    @if (!empty($item->educacion))
                        <td>{{$item->educacion}}</td>
                    @endif
                     @if (!empty($item->entero))
                        <td>{{$item->entero}}</td>
                    @endif
                     @if (!empty($item->whatsapp))
                        <td>{{$item->whatsapp}}</td>
                    @endif



                    @if (!empty($item->asistio))
                        <td>{{$item->asistio}}</td>
                    @endif
                    
                    
                </tr>
            @endforeach


        {{-- EN CASO DE QUE NO EXISTAN REGISTROS  --}}
        @else
            <tr>
                <td colspan='20' class="border">No existen registros.</td>
            </tr>
        @endif
        {{-- FIN DE EN CASO DE QUE NO EXISTAN REGISTROS  --}}
</table>