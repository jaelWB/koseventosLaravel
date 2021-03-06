<h3>{{$nombre}}</h3>
<br>
<table>
        <tr>
            <td scope="col">#</td>
            <td scope="col">Nombres</td>
            <td scope="col">Apellidos</td>
            <td scope="col">Evento</td>
             <td scope="col">Correo</td>
            <td scope="col">Titulo</td>
            <td scope="col">Cargo</td>
            <td scope="col">Empresa</td>
            <td scope="col">Celular</td>
            <td scope="col">Telefono</td>
            <td scope="col">Direccion</td>
            <td scope="col">Genero</td>
            <td scope="col">Otro genero</td>
            <td scope="col">Ciudad</td>
            <td scope="col">Rango_edad</td>
            <td scope="col">Como se enteró</td>
            <td scope="col">Otra forma de enterarse</td>
            <td scope="col">Cargos estandarizados</td>
            <td scope="col">Desea</td>
            <td scope="col">Asistir</td>
            <td scope="col">Educacion</td>
            <td scope="col">Fecha y hora</td>
        
        @if (!$model->isEmpty())
            @php
                $cont =1;
            @endphp
            @foreach ($model as $item)
                
                <tr>
                    <td scope="row">{{$cont++}}</td>
                    <td>{{$item->registro->nombres}}</td>
                    <td>{{$item->registro->apellidos}}</td>
                    <td>{{$nombre}}</td>
                    <td>{{$item->registro->correo}}</td>
                     <td>{{$item->registro->titulo}}</td>
                    <td>{{$item->registro->cargo}}</td>
                    <td>{{$item->registro->empresa}}</td>
                    <td>{{$item->registro->celular}}</td>
                    <td>{{$item->registro->telefono}}</td>
                    <td>{{$item->registro->direccion}}</td>
                    <td>{{$item->registro->genero}}</td>
                    <td>{{$item->registro->otro_genero}}</td>
                    <td>{{$item->registro->ciudad}}</td>
                    <td>{{$item->registro->rango_edad}}</td>
                    <td>{{$item->registro->entero}}</td>
                    <td>{{$item->registro->otro_entero}}</td>
                    <td>{{!empty($item->registro->cargos_estandarizados_id)?$item->registro->cargos->descripcion:'--'}}</td>
                    <td>{{$item->registro->desea}}</td>
                    <td>{{$item->registro->asistir}}</td>
                    <td>{{$item->registro->educacion}}</td>

                    <td>{{$item->fecha}}</td>
                    
                    
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