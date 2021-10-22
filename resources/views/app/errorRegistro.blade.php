@extends('layouts.front')

@section('content')
 {!!$evento->analytics!!}

{{-- CABECERA --}}

<div class="container-fluid">

    <div class="row">
        <div class="col-12 p-0 m-0">
            <div class="header-interno-home-f" style="background: url({{asset('upload/evento/'.$evento->imagen_interna) }}) ">
                <div class="text-center">
                    <a href="{{route('home')}}"><img src="{{asset('assets/img/frame-38.png')}}" alt="Ekos Eventos" class="logo-front"></a>

                </div>

                {{-- CONTENEDOR DE GRACIAS --}}
                <div class="contenedor-gracias rd ">
                    <div class="texto-gracias rd ">
                        
                        <p class="texto-gracias-gracias2 mt-3 px-4 bg-dangesr p-4 text-dark rd "><b>ERROR, no se ha podido guardar la información ya que el CORREO ELECTRÓNICO enviado ya se encuentra registrado para este evento.</b></p>
                        <div class="mas-info-btn text-center mt-5">
                            <div>
                                 
                                <a href="{{route('home.evento',array('nombre' => $slug))}}" class="btn btn-warning " ><b>Volver al evento</b></a>
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
