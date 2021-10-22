@extends('layouts.front')
@section("title") {{$evento->nombre}} | Ekos Negocios @endsection
@section('analytics')
 {!!$evento->analytics!!}
@php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
@endphp
<meta property="og:url"                content="{{$actual_link}}" />
<meta property="og:type"               content="website" />

<meta property="og:title"              content="{{$evento->nombre}}" />
<meta property="og:description"        content="{!!$evento->introduccion!!}" />
<meta property="og:image"              content="{{asset('upload/evento/'.$evento->imagen_interna) }}" />

@endsection

@section('content')


{{-- CABECERA --}}

<div class="container-fluid p-0">

    {{-- INSERTAMOS LA CABECERA DEL EVENTO  --}}
    @include('app.cabeceraEvento', array('evento' => $evento,'logos' => $logos,'ciudad' => $ciudad,'conferencias' => $conferencias,'expositore' => $expositore,'logosP'=>$logosP) )
    @include('app.auspiciantes', array('evento' => $evento,'logos' => $logos) )
    @include('app.detalle', array('evento' => $evento,'logos' => $logos,'objetivos' => $objetivos) )
    @include('app.bannerUno', array('evento' => $evento) )
    @include('app.agenda', array('evento' => $evento) )
    @include('app.grupos', array('evento' => $evento, 'conferencias' => $conferencias) )
    @include('app.bannerDos', array('evento' => $evento) )

    @include('app.expositores', array('evento' => $evento, 'expositore' => $expositore) )


    @include('app.registroModal', array('evento' => $evento,'ciudad' => $ciudad,  'miForm'=>$miForm,
                'tk'=>$tk,
                'ubicaciones'=>$ubicaciones,
                'asociados'=>$asociados,) )
    
    {{-- @include('app.botonFinal', array('evento' => $evento, 'expositore' => $expositore) ) --}}

   

@if ($evento->inscripcion == 'SI')

    <div class="widget">
        <div class="text-center  wow animate__animated animate__fadeIn">
             @if (!empty($evento->enlace_boton))
                <a class="btn btn-tt" style="background: {{$evento->color_botones}}; color: {{$evento->color_fuente_botones}}" href="{{$evento->enlace_boton}}" target="_blank">{{$evento->nombre_boton}}</a>
            @else 
                <div data-toggle="modal" data-target="#staticBackdrop" class="btn btn-tt" style="background: {{$evento->color_botones}}; color: {{$evento->color_fuente_botones}}">{{$evento->nombre_boton}}</div>
                
            @endif

        </div>
    </div>


    
    @endif


    {{-- MODAL INTRO --}}
    @if ($evento->enlace_modal != '')
    <input type="hidden" id="modalHome" value="{{$evento->imagen_modal}}">
    <div class="modal fade" id="staticBackdropH"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropHLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="close btmodas" data-dismiss="modal" aria-label="Close">
                        <i class="icofont-close-line text-white"></i>
                    </button>
                    <a href="{{$evento->enlace_modal}}" target="_blank">
                        <img class="img-fluid" src="{{asset('upload/evento/'.$evento->imagen_modal)}}" alt="">
                    </a>
                </div>
                
            </div>
        </div>
    </div>
    @endif



    <script type="text/javascript">
       
    </script>
    {{-- FIN MODAL INTRO --}}


    

</div>
{{-- FIN DEL CUERPO --}}

@endsection
