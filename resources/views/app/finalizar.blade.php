@extends('layouts.front')

@section('content')
 {!!$evento->analytics!!}

{{-- CABECERA --}}

<div class="container-fluid">

    <div class="row">
        <div class="col-12 p-0 m-0">
            <div class="header-interno-home-f" style="background: url({{asset('upload/evento/'.$evento->imagen_gracias) }}) ">
                <div class="text-center">
                    <a href="{{route('home')}}"><img src="{{asset('assets/img/frame-38.png')}}" alt="Ekos Eventos" class="logo-front"></a>

                </div>

                {{-- CONTENEDOR DE GRACIAS --}}
                <div class="contenedor-gracias">
                    <div class="texto-gracias">
                        @if (!empty($leads))
                            <h1 class="texto-gracias-titulo mt-5 text-center ">{{$leads->nombre}}</h1>  
                            <p class="texto-gracias-gracias mt-1 px-4">Te damos la bienvenida y las gracias por registrarte</p>

                        @else
                            <p class="texto-gracias-gracias mt-5 px-4 pt-4">Te damos la bienvenida y las gracias por registrarte</p>
                        @endif
                        <p class="texto-gracias-gracias2 mt-3 px-4">{{$evento->texto_registro}}</p>
                        <div class="mas-info-btn text-center mt-5">
                            <div>
                                <a href="{{route('home')}}" class="btnregistrar">Explorar eventos</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- FIN DEL CONTENEDOR DE GRACIAS --}}
                
            </div>
        </div>
    </div>
</div>
{{-- CABECERA FIN --}}




@endsection
