<h3>Registro de usuarios </h3>
<br>
<table style="border:1px solid">
        <tr>
            <td scope="col">#</td>
            <td scope="col">Nombres</td>
            <td scope="col">Apellidos</td>
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
                    <td>{{$item->nombres}}</td>
                    <td>{{$item->apellidos}}</td>
                    <td>{{$item->correo}}</td>

                    <td>{{$item->titulo}}</td>
                    <td>{{$item->cargo}}</td>
                    <td>{{$item->empresa}}</td>
                    <td>{{$item->celular}}</td>
                    <td>{{$item->telefono}}</td>
                    <td>{{$item->direccion}}</td>
                    <td>{{$item->genero}}</td>
                    <td>{{$item->otro_genero}}</td>
                    <td>{{$item->ciudad}}</td>
                    <td>{{$item->rango_edad}}</td>
                    <td>{{$item->entero}}</td>
                    <td>{{$item->otro_entero}}</td>
                    <td>{{!empty($item->cargos_estandarizados_id)?$item->cargos->descripcion:'--'}}</td>
                    <td>{{$item->desea}}</td>
                    <td>{{$item->asistir}}</td>
                    <td>{{$item->educacion}}</td>

                    <td>{{$item->created_at}}</td>
                    
                    
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