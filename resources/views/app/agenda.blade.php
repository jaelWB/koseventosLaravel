@if (!empty($evento->imagen_agenda))
    
<div id="agenda" class="container-fluid my-0  wow animate__animated animate__fadeIn" style="background: {{$evento->color_agenda}}; color:{{$evento->color_texto_agenda}}">
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-12 text-center">
                <label class="texto-espera-titulo" style="color:{{$evento->color_texto_agenda}}">
                    <i class="icofont-ui-calendar d-block mb-2"></i>
                    {{(!empty($evento->agenda_t))?$evento->agenda_t:'AGENDA'}}
                </label>
            </div>

            <div class="col-12 text-center  wow animate__animated animate__bounceIn animate__delay-1s">
                <img src="{{asset('upload/evento/'.$evento->imagen_agenda)}}" alt="{{$evento->nombre}}" title="{{$evento->nombre}}" class="img-fluid d-none d-md-block mx-auto text-center my-3">
                @if (!empty($evento->agenda_responsive))
                    <img src="{{asset('upload/evento/'.$evento->agenda_responsive)}}" alt="{{$evento->nombre}}" title="{{$evento->nombre}}" class="img-fluid d-block d-md-none mx-auto  text-center my-3">
                @else 
                    <img src="{{asset('upload/evento/'.$evento->imagen_agenda)}}" alt="{{$evento->nombre}}" title="{{$evento->nombre}}" class="img-fluid d-block d-md-none mx-auto  text-center my-3">

                @endif
            </div>

           <div class="col-12 text-center py-4">
                @include('app.boton', array('evento' => $evento) )
           </div>
        </div>
    </div>
</div>
@endif
