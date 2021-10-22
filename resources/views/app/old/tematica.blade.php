@extends('layouts.front')

@section('content')
 {!!$evento->analytics!!}

{{-- CABECERA --}}

<div class="container-fluid">

    <div class="row">
        <div class="col-12 p-0 m-0">
            <div class="header-interno-home-2">
                <div class="text-center">
                    <a href="{{route('home')}}"><img src="{{asset('assets/img/frame-38.png')}}" alt="Ekos Eventos" class="logo-front"></a>

                </div>

                {{-- contenido del header  --}}
                <h1 class="titulo-evento-interno">TEMÁTICA / EXPOSITORES</h1>
                {{-- fin del contenido del header  --}}
                
            </div>
        </div>
    </div>
</div>
{{-- CABECERA FIN --}}


{{-- DETALLE DE TEMÁTICA --}}
<div class="container bg-tematica">
    <div class="row">
        <div class="col-12 bg-tematica-fondo">
            <h2 class="titulo-tematica mt-5 text-center">TEMÁTICAS</h2>
        <div class="text-justify texto-tema px-3 mt-3">{!!$evento->descripciontematica!!}</div>


             <h2 class="titulo-tematica mt-5 text-center">CONTENIDO</h2>
            <div class="text-justify texto-tema px-3 mt-3 text-white">
                {!!$evento->contenido!!}
            </div>


        </div>

        {{-- DETALLED DE CIUDADES  --}}
        @if (!$ciudades->isEmpty())
            @foreach ($ciudades as $itemCi)
                <div class="col ciudades" style="background: url({{asset('upload/ciudades/'.$itemCi->ciudad->imagen)}})">
                    <h3 class="ciudades-titulo mt-3 mb-0 text-center">{{$itemCi->ciudad->nombre}}</h3>
                    <div class="text-center text-white mb-3">
                        @php
                           $mes = array(
                               'Enero',
                               'Febrero',
                               'Marzo',
                               'Abril',
                               'Mayo',
                               'Junio',
                               'Julio',
                               'Agosto',
                               'Septiembre',
                               'Octubre',
                               'Noviembre',
                               'Diciembre',
                            );
                            $f =explode('-',$itemCi->fecha);
                            echo $f[2].' de '.$mes[$f[1]-1];
                        @endphp
                    </div>
                </div>
            @endforeach
            
        @endif
        {{-- FIN DETALLED DE CIUDADES  --}}

    </div>
</div>
{{-- FIN DE DETALLE DE TEMÁTICA --}}

{{-- CUERPO INICIO --}}
    
<div class="container mb-5">

{{-- DESPLIEGUE DE EXPOSITORES  --}}
@if (!$expositores->isEmpty())
    <div class="row">
        @if ($evento->inscripcion == 'SI')
           <div class="col-12 mb-5">
                <div class="mas-info-btn text-center">
                    <div>
                        <a href="{{route('home.registro',md5($evento->id))}}" class="btnregistrar">Inscribirme ahora</a>
                    </div>
                </div>
           </div>
        @endif

        <div class="col-12"><h3 class="text-center">EXPOSITORES</h3></div>
        <div class="col-12 texto-expo text-center">{{$evento->descripcionexpositores}}</div>
        <div class="col-12 mt-5">
               <div class="row text-center">

                @foreach ($expositores as $expo)
                    
                    <div class="col-12 col-md-4 mx-auto mb-4">
                        <div class="card bg-light text-center ">
                            <img  src="{{asset('upload/expositores/'.$expo->imagen)}}" alt="Ekos eventos | {{$expo->nombre}}" class="rounded-circle mx-auto mt-2 img-perfil">
                            <div class="card-body text-center my-4">
                                <h5 class="card-title text-center">{{$expo->nombre}}</h5>
                                <h6 class="card-title text-center">{{$expo->tipo}}</h6>

                            <div class="card-text text-center">{{substr($expo->resumen,0,300)}}</div>
                                
                                <div class="mt-3">
                                    @if (!empty($expo->url))
                                    <a target="_blank" href="{{$expo->url}}" class="btninfor2 ">Más información</a><br>
                                     @endif

                                    @if ($expo->linkedin)
                                        <a target="_blank" href="{{$expo->linkedin}}" class="text-dark ico30 "><i class="icofont-linkedin"></i></a>  
                                    @endif
                                    @if ($expo->facebook)
                                        <a target="_blank" href="{{$expo->facebook}}" class="text-dark ico30 "><i class="icofont-facebook"></i></a>  
                                    @endif
                                     @if ($expo->instagram)
                                        <a target="_blank" href="{{$expo->instagram}}" class="text-dark ico30 "><i class="icofont-instagram"></i></a>  
                                    @endif
                                     @if ($expo->twitter)
                                        <a target="_blank" href="{{$expo->twitter}}" class="text-dark ico30 "><i class="icofont-twitter"></i></a>  
                                    @endif
                                </div>
                                

                            </div>
                        </div>

                        @if ($evento->inscripcion == 'SI')
                            <div class="mas-info-btn text-center">
                                <div>
                                    <a href="{{route('home.registro',md5($evento->id))}}" class="btnregistrar">Inscribirme ahora</a>
                                </div>
                            </div>
                        @endif


                    </div>
                    
                @endforeach
                    
                    
                     
               </div>
        </div>
    </div>
@endif
{{-- FIN DEL DESPLIEGUE DE EXPOSITORES  --}}



    @if (!$logosSuperior->isEmpty())
        
    {{-- logotipos --}}
    <div class="row mt-5">
        @foreach ($logosSuperior as $ls)
            <div class="col-6 col-md-3 bg-light text-center">
                <img src="{{asset('upload/logo/'.$ls->imagen)}}" title="{{$ls->nombre}}" class="img-fluid">
            </div>    
        @endforeach
       
    </div>
    {{-- fin de logotipos --}}
    @endif

    
</div>

@if (!$logosInferior->isEmpty())

    <div class="container-fluid bg-sublogo">
        <div class="container">
                {{-- logotipos de menor nivel --}}
            <div class="row  py-4">
                @foreach ($logosInferior as $ls)
                    <div class="col-4 col-md-2 bg-sublogo">
                        <img src="{{asset('upload/logo/'.$ls->imagen)}}" title="{{$ls->nombre}}" class="img-fluid">
                    </div>    
                @endforeach

               
            </div>
            {{-- fin logotipos de menor nivel --}}
        </div>
    </div>
{{-- FIN DEL CUERPO --}}
@endif


@endsection
