@if (!empty($evento->seccion_banner))
    <div class="container-fluid py-0  wow animate__animated animate__fadeIn p-0 m-0">
        {!!$evento->seccion_banner!!}
    </div>
@elseif(!empty($evento->banner_secundario) && !empty($evento->titulo_banner_promocional))
    <div class="container-fluid py-2 bg-bannerUno  wow animate__animated animate__fadeIn" style="background:url('{{asset('upload/evento/'.$evento->banner_promocional)}}')" >
        <div class="container">
            <h3 class=" wow animate__animated animate__bounceIn animate__delay-1s animate__delay-1s text-center mt-5 text-bannerUno" style="color:{{$evento->color_fuente}};"><b> {{$evento->titulo_banner_promocional}} </b></h3>
            <p class="text-center wow animate__animated animate__bounceIn animate__delay-1s text-bd" style="color:{{$evento->color_fuente}}!important;">{{$evento->texto_banner_uno}}</p>

            
            <div class="text-center pt-3 wow animate__animated animate__bounceIn animate__delay-1s">
                @if (!empty($evento->boton_banner_uno) && !empty($evento->texto_boton_banner_uno))
                    <a class="btn" style="background: {{$evento->color_botones}}; color: {{$evento->color_fuente_botones}} " href="{{$evento->boton_banner_uno}}" target="_blank">{{$evento->texto_boton_banner_uno}}</a>
                @endif
                
            </div>
        </div>
    </div>
@endif