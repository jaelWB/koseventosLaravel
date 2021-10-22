<h3>{{$nombre}}</h3>
<br>
<table>
        <tr>
            <td scope="col">#</td>
            <td scope="col">Nombres</td>
            <td scope="col">Apellidos</td>
            <td scope="col">Evento</td>
            <td scope="col">Email</td>
            <td scope="col">Teléfono</td>
            <td scope="col">Celular Whatsapp</td>
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
                    <td>{{$item->registro->correo}}</td>
                    <td>{{$item->registro->telefono}}</td>
                    <td>{{$item->registro->celular}}</td>
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