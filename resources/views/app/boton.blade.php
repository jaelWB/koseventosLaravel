@if ($evento->inscripcion == 'SI')
    
<div class="text-center  wow animate__animated animate__fadeIn">
    @if (!empty($evento->enlace_boton))
        <a class="btn" style="background: {{$evento->color_botones}}; color: {{$evento->color_fuente_botones}}" href="{{$evento->enlace_boton}}" target="_blank">{{$evento->nombre_boton}}</a>
    @else 
        <button data-toggle="modal" data-target="#staticBackdrop" class="btn" style="background: {{$evento->color_botones}}; color: {{$evento->color_fuente_botones}}">{{$evento->nombre_boton}}</button>

    @endif
</div>
@endif




