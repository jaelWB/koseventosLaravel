@extends('layouts.front')

@section('analytics')
 {!!$evento->analytics!!}
@endsection

@section('content')


{{-- CABECERA --}}

<div class="container-fluid">

    <div class="row">
        <div class="col-12 p-0 m-0">
            <div class="header-interno-home-2">
                <div class="text-center">
                    <a href="{{route('home')}}"><img src="{{asset('assets/img/frame-38.png')}}" alt="Ekos Eventos" class="logo-front"></a>
                    
                </div>

                {{-- contenido del header  --}}
                <h1 class="titulo-evento-interno">{{$evento->titulointerno}}</h1>

                <div class="contenido-resumen-evento">
                    <div class="row m-0">
                        <div class="col-12 col-md-4 p-0">
                            <img src="{{asset('upload/evento/'.$evento->imagendescripcion)}}" class="img-fluid img-des">
                        </div>
                        <div class="col-12 col-md-8">
                        <div class="text-white p-2 py-3 text-justify text-onfp">{{substr($evento->descripcioninterna,0,240)}}</div>

                            <div class="row mb-1">
                                <div class="col-12 col-md-6 px-4">
                                    <a href="{{route('home.tematica',md5($evento->id))}}" class="btninfor">Más información</a>
                                </div>
                                @if ($evento->inscripcion == 'SI')
                                    <div class="col-12 col-md-6 my-4 my-md-0 px-4">
                                        <a href="{{route('home.registro',md5($evento->id))}}" class="btnregistrar">Inscribirme ahora</a>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>

                {{-- fin del contenido del header  --}}
                
            </div>
        </div>
    </div>
</div>
{{-- CABECERA FIN --}}


{{-- CUERPO INICIO --}}
<div class="container">

        <div class="row">
            
            
            @if (!$logos->isEmpty())
                <div class="col-12 bg-logos">
                    @foreach ($logos as $l)
                        @if ($l->tipo == 'auspiciante')
                            <img src="{{asset('upload/logo/'.$l->imagen)}}" alt="Logos auspiciantes {{$l->nombre}}" class=" my-2">                            
                        @endif
                    @endforeach
                </div>
            @endif
            

         

        </div>

    
    {{-- DETALLE DE CONFERENCIAS  --}}
    @if (!$conferencias->isEmpty())
        
    <div class="row">
        
        <div class="col-12 my-5 text-center">
            <h4 class="text-center Eventos-y-Conferencias">Eventos y Conferencias</h4>
        </div>

        {{-- 1 --}}
        @if ($evento->embed !='')
            <div class="row">
                <div class="col-12 col-md-9">
                    @foreach ($conferencias as $itemC)     
                        <div class="col-12 col-md-6 bg-light mb-5 detalle-card-general">
                            <div class="row">
                                <div class="col-5">
                                    <img src="{{asset('upload/conferencia/'.$itemC->imagen)}}" title="{{$itemC->nombre}}" class="img-fluid">
                                </div>
                                <div class="col-7 detalle-card py-3 px-2">
                                    <h5>{{$itemC->nombre}}</h5>
                                    <p>{{substr($itemC->descripcion,0,250)}}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-12 col-md-3 p-0">
                    {!!$evento->embed!!}
                </div>

            </div>
            @else
             @foreach ($conferencias as $itemC)     
                <div class="col-12 col-md-6 bg-light mb-5 detalle-card-general">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{asset('upload/conferencia/'.$itemC->imagen)}}" title="{{$itemC->nombre}}" class="img-fluid">
                        </div>
                        <div class="col-7 detalle-card py-3 px-2">
                            <h5>{{$itemC->nombre}}</h5>
                            <p>{{substr($itemC->descripcion,0,250)}}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        @endif

        {{-- 1 --}}
        <div class="col-12 text-center py-3 mb-4">
            <a href="{{route('home.tematica',md5($evento->id))}}" class="btnregistrar">Más información</a>
        </div>

    </div>
    @endif

    {{-- FIN DEL DETALLE DE CONFERENCIAS  --}}

</div>
{{-- FIN DEL CUERPO --}}

@endsection
