@if (!empty($evento->seccion_banner_secundario))
    <div class="container-fluid py-2 mx-auto  wow animate__animated animate__fadeIn">
        {!!$evento->seccion_banner_secundario!!}
    </div>
@elseif(!empty($evento->banner_secundario) && !empty($evento->titulo_banner_secundario))
    <div class="container-fluid  bg-bannerDos p-0  wow animate__animated animate__fadeIn" >
        <img src="{{asset('upload/evento/'.$evento->banner_secundario)}}" alt="{{$evento->nombre}}" title="{{$evento->nombre}}" class="img-fluid">
        
        <div class="contenido-bg-Dos">
            <h3 class="text-left mt-5 text-bannerDos wow animate__animated animate__bounceIn animate__delay-1s" style="color:{{$evento->color_fuente}};"><b> {{$evento->titulo_banner_secundario}} </b></h3>
            <p class="wow animate__animated animate__bounceIn animate__delay-1s text-bd" style="color:{{$evento->color_fuente}};">{{$evento->contenido_banner_secundario}}</p>
           
            <div class="text-center pt-4 wow animate__animated animate__bounceIn animate__delay-1s">
                 @if (!empty($evento->boton_banner_dos) && !empty($evento->enlace_banner_dos))
                    <a class="btn" style="background: {{$evento->color_botones}}; color: {{$evento->color_fuente_botones}}" href="{{$evento->enlace_banner_dos}}" target="_blank">{{$evento->boton_banner_dos}}</a>

                @else
                    @include('app.boton', array('evento' => $evento) )
                @endif
                
            </div>
        </div>
        


    </div>
@endif