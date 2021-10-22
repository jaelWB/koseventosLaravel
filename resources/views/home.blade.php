@extends('layouts.front')

@section('content')

{{-- CABECERA --}}

<div class="container-fluid">

    <div class="row">
        <div class="col-12 p-0 m-0">
            <div class="header-interno-home">

                

                <div class="text-center">
                    <a href="{{route('home')}}"><img src="{{asset('assets/img/frame-38.png')}}" alt="Ekos Eventos" class="logo-front"></a>
                </div>

                {{-- CAMPOS DEL HEADER  --}}
                <div class="container mt-5 relative">
                    <div class="logo-enlace">
                        <a href="https://ekosnegocios.com/" target="_blank"><img src="{{asset('assets/img/logoEkos.png')}}" alt="Ekos Negocios"></a>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mt-4">
                            {{-- FORMULARIO DE BUSQUEDA --}}
                            <form action="{{route('home.buscar')}}" method="POST">
                                @csrf
                                <div>
                                    <label class="text-white">Buscar evento</label>
                                    <div class="input-group mb-3">
                                        <input name="parametro" type="text" required class="form-control border" placeholder="Por nombre del evento" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn-search bg-white border-0" type="submit" id="button-addon2">
                                                <img src="{{asset('assets/img/search.png')}}" class="img-fluid">
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            {{-- FIN DEL FORM  --}}
                        </div>
                    </div>
                    <div class="row">
                        @if ($ciudades)
                            <div class="col-12 col-md-3">
                                <label class="text-white"><img src="{{asset('assets/img/mdi-tooltip-account.png')}}" class="img-fluids"> Locación</label>
                                <select name="ciudades_home" id="ciudades_home" class="form-control">
                                    <option value="todos">Todos</option>
                                    @foreach ($ciudades as $city)
                                    @php
                                        $act = '';
                                        if($ubicacion == $city->id){
                                           $act = 'selected'; 
                                        }
                                    @endphp
                                            <option {{$act}} value="{{$city->id}}">{{$city->nombre}}</option>
                                    @endforeach
                                </select>
                                <div class="mt-2 d-none">
                                    <a href="{{route('home',array('ubicacion'=>'todos','tipo'=>$tipo))}}" class="btn btn-locacion {{$ubicacion!='todos'?'':'active'}}">Todos</a>
                                    @foreach ($ciudades as $city)
                                            <a href="{{route('home',array('ubicacion'=>$city->id,'tipo'=>$tipo))}}" class="btn btn-locacion {{$ubicacion!=$city->id?'':'active'}}">{{$city->nombre}}</a>
                                    @endforeach
                                </div>
                            </div>

                        @endif
                        <div class="col-12 col-md-2">
                                <label class="text-white"><img src="{{asset('assets/img/calendar-today.png')}}" class="img-fluids"> Mes</label>
                                <select name="meses_home" id="meses_home" class="form-control">
                                    <option value="todos">Todos</option>
                                    <option {{$mes == '01'?'selected':''}} value="01">Enero</option>
                                    <option {{$mes == '02'?'selected':''}}  value="02">Febrero</option>
                                    <option {{$mes == '03'?'selected':''}}  value="03">Marzo</option>
                                    <option {{$mes == '04'?'selected':''}}  value="04">Abril</option>
                                    <option  {{$mes == '05'?'selected':''}} value="05">Mayo</option>
                                    <option {{$mes == '06'?'selected':''}}  value="06">Junio</option>
                                    <option {{$mes == '07'?'selected':''}}  value="07">Julio</option>
                                    <option {{$mes == '08'?'selected':''}}  value="08">Agosto</option>
                                    <option {{$mes == '09'?'selected':''}}  value="09">Septiembre</option>
                                    <option {{$mes == '10'?'selected':''}}  value="10">Octubre</option>
                                    <option {{$mes == '11'?'selected':''}}  value="11">Noviembre</option>
                                    <option {{$mes == '12'?'selected':''}}  value="12">Diciembre</option>
                                    
                                </select>
                                <div class="mt-2 d-none">
                                    <a href="{{route('home',array('ubicacion'=>'todos','tipo'=>$tipo))}}" class="btn btn-locacion">Todos</a>
                                </div>
                            </div>
                        {{-- FILTRO CON FECHA  --}}
                        <div class="col-12 col-md-3 ">
                            <label class="text-white mt-2 mt-md-0"><img src="{{asset('assets/img/mod.png')}}" class="img-fluids"> Modalidad</label>
                            <div class="mt-1">
                                    <a href="{{route('home',array('ubicacion'=>$ubicacion,'tipo'=>$tipo,'modalidad'=>'Presencial','mes'=>$mes))}}" class="btn btn-sm btn-locacion {{$modalidad!='Presencial'?'':'active'}}">Presencial</a>
                                    <a href="{{route('home',array('ubicacion'=>$ubicacion,'tipo'=>$tipo,'modalidad'=>'Virtual','mes'=>$mes))}}" class="btn btn-sm btn-locacion {{$modalidad!='Virtual'?'':'active'}}">Virtual</a>
                            </div>
                        </div>

                        

                        {{-- FITLRO CON COSTO  --}}
                        <div class="col-12 col-md-4 mt-3 mt-md-0 text-left">
                            <label class="text-white"><img src="{{asset('assets/img/ic-cash.png')}}" class="img-fluids"> Costo</label>
                            <div class="mt-1">
                                
                                    <a href="{{route('home',array('ubicacion'=>$ubicacion,'tipo'=>'gratis','modalidad'=>$modalidad,'mes'=>$mes))}}" class="btn btn-locacion {{$tipo!='gratis'?'':'active'}}">Gratis</a>
                                    <a href="{{route('home',array('ubicacion'=>$ubicacion,'tipo'=>'pago','modalidad'=>$modalidad,'mes'=>$mes))}}" class="btn btn-locacion {{$tipo!='pago'?'':'active'}}">De pago</a>
                                    <a href="{{route('home',array('ubicacion'=>$ubicacion,'tipo'=>'todos','modalidad'=>'todos','mes'=>'todos'))}}" class="btn btn-locacion {{$tipo!='todos'?'':'active'}}">Todos los eventos</a>
                            </div>
                        </div>

                        {{-- GUARDAR LOS PARAMETROS PARA BUSCAR  --}}
                        <input type="hidden" id="ubiacionB" value="{{$ubicacion}}">
                        <input type="hidden" id="tipoB" value="{{$tipo}}">
                        <input type="hidden" id="modalidadB" value="{{$modalidad}}">
                        <input type="hidden" id="mesB" value="{{$mes}}">
                        <input type="hidden" id="urlB" value="{{route('home')}}">
                        {{-- FINGUARDAR LOS PARAMETROS PARA BUSCAR  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- CABECERA FIN --}}

<div class="container contenedor-eventos">
    <div class="row p-0">

        {{-- LOOP DE EVENTOS  --}}
        @if (!$eventos->isEmpty())
            @foreach ($eventos as $event)
                @if ($event->evento->estado =='Activo')
                    @if ($event->evento->estado == 'Activo')
                        @php
                            $presentacion ='col-md-12';
                            if($event->evento->presentacion ==1){
                                $presentacion ='col-md-4';
                            }elseif($event->evento->presentacion ==2){
                                $presentacion ='col-md-6';
                            }
                        @endphp


                        <div class="col-12 {{$presentacion}} p-0">
                            <div class="hover01 column">
                                <div class="d-block">
                                    
                                    {{-- GENERAMOS EL SLUG PARA EL EVENTO  --}}
                                    @php
                                        $slug = preg_replace('/[^A-Za-z0-9]/', "-", strtolower($event->evento->nombre));
                                    @endphp  

                                    <a href="{{route('home.evento',array('nombre' => $event->slug))}}">

                                        @if ($mobile ==1)
                                            @if (!empty($event->evento->mobil))
                                         

                                                <figure>
                                                    <img src="{{asset('upload/evento/'.$event->evento->mobil)}}" class="img-fluid" />
                                                        <div class="intro-evento w-100">
                                                            <div class="row">
                                                                
                                                                <div class="col-12">
                                                                    <a class="text-white" href="{{route('home.evento',array('nombre' => $event->slug))}}">
                                                                        <h5 class="Titulo-de-evento">{{$event->evento->nombre}}</h5>
                                                                    </a>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    
                                                                    <h6>{{$event->evento->categoria->descripcion}}</h6>
                                                                </div>
                                                                <div class="col-12 col-md-8">
                                                                    <label class="subtitlo-home">{{$event->evento->tematica}}</label>
                                                                    <label class="subtitlo-home text-right">{{$event->ciudad->nombre}} - 
                                                                        @php
                                                                            $fe = '';
                                                                            $dd = explode('-',$event->fecha);
                                                                            echo $dd['1'].'/'.$dd['2'];
                                                                        @endphp
                                                                    </label>
                                                                </div>

                                                            </div>
                                                                
                                                                
                                                        </div>
                                                </figure>
                                            @else
                                                <figure style="background: url({{asset('upload/evento/'.$event->evento->imagen)}})">
                                                    <img src="{{asset('upload/evento/'.$event->evento->imagen)}}" class="img-fluid" />
                                                        <div class="intro-evento w-100">
                                                            <div class="row">
                                                                
                                                                <div class="col-12">
                                                                    <a class="text-white" href="{{route('home.evento',array('nombre' => $event->slug))}}">
                                                                        <h5 class="Titulo-de-evento">{{$event->evento->nombre}}</h5>
                                                                    </a>
                                                                </div>
                                                                <div class="col-12 col-md-4">
                                                                    
                                                                    <h6>{{$event->evento->categoria->descripcion}}</h6>
                                                                </div>
                                                                <div class="col-12 col-md-8">
                                                                    <label class="subtitlo-home">{{$event->evento->tematica}}</label>
                                                                    <label class="subtitlo-home text-right">{{$event->ciudad->nombre}} - 
                                                                        @php
                                                                            $fe = '';
                                                                            $dd = explode('-',$event->fecha);
                                                                            echo $dd['1'].'/'.$dd['2'];
                                                                        @endphp
                                                                    </label>
                                                                </div>

                                                            </div>
                                                                
                                                                
                                                        </div>
                                                </figure>
                                            @endif
                                            
                                        @else

                                            <figure style="background: url({{asset('upload/evento/'.$event->evento->imagen)}})">
                                                <img src="{{asset('upload/evento/'.$event->evento->imagen)}}" class="img-fluid" />
                                                    <div class="intro-evento w-100">
                                                        <div class="row">
                                                            
                                                            <div class="col-12">
                                                                <a class="text-white" href="{{route('home.evento',array('nombre' => $event->slug))}}">
                                                                    <h5 class="Titulo-de-evento">{{$event->evento->nombre}}</h5>
                                                                </a>
                                                            </div>
                                                            <div class="col-12 col-md-4">
                                                                
                                                                <h6>{{$event->evento->categoria->descripcion}}</h6>
                                                            </div>
                                                            <div class="col-12 col-md-8">
                                                                <label class="subtitlo-home">{{$event->evento->tematica}}</label>
                                                                <label class="subtitlo-home text-right">{{$event->ciudad->nombre}} - 
                                                                    @php
                                                                        $fe = '';
                                                                        $dd = explode('-',$event->fecha);
                                                                        echo $dd['1'].'/'.$dd['2'];
                                                                    @endphp
                                                                </label>
                                                            </div>

                                                        </div>
                                                            
                                                            
                                                    </div>
                                            </figure>

                                        @endif
                                        
                                        
                                    </a>
                                </div>
                                
                            </div>
                        </div>


                    @endif

                @endif
            @endforeach            
        @else
             <div class="col-12 mt-5 pb-5">
                 <div class="mt-5 pb-1">
                    <div class="mt-5 text-center nohay p-4">
                        <h3 class="text-center mx-auto ">
                            <i class="icofont-exclamation-circle"></i> Lo sentimos no hemos encontrado eventos disponibles por el momento.
                        </h3>
                    </div>
                </div>
             </div>
        @endif

        {{-- FIN DEL LOOP DE EVENTOS  --}}


       
    </div>
</div>

@endsection
