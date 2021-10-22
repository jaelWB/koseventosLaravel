<div class="row"></div>
    <div class="col-12 px-0 mx-0 wow animate__animated animate__backInDown">
        <div id="inicio" class="bg-cabecera" style="background: url({{asset('upload/evento/'.$evento->imagen_interna) }}) ">
           
            <div class="container  relative h-100">
                 <nav class="navbar fixed-top  navbar-expand-lg pt-0 text-white mx-auto  wow animate__animated animate__bounceIn animate__delay-1s" id="nav-principal-evento">
                    <a class="navbar-brand pt-0" href="{{route('home')}}">
                        <img src="{{asset('assets/img/logoFront.png')}}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="icofont-navigation-menu text-dark"></i>
                    </button>

                    <div class="collapse navbar-collapse pt-0" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto pt-0 text-white enlaces-menu-interno">
                            <li class="nav-item active px-0 px-md-3">
                                <a class="nav-link acabe" href="#inicio">INICIO</span></a>
                            </li>
                            @if(!empty($evento->objetivos_t))
                            <li class="nav-item px-0 px-md-3">
                                <a class="nav-link acabe" href="#detalle">{{(!empty($evento->objetivos_t))?$evento->objetivos_t:'OBJETIVOS'}}</a>
                            </li>
                            @endif
                            @if(!empty($evento->agenda_t))

                            <li class="nav-item px-0 px-md-3">
                                <a class="nav-link acabe" href="#agenda">{{(!empty($evento->agenda_t))?$evento->agenda_t:'AGENDA'}}</a>
                            </li>
                            @endif

                            @if (!$conferencias->isEmpty())
                                 <li class="nav-item px-0 px-md-3">
                                    <a class="nav-link acabe" href="#grupos">{{(!empty($evento->grupos_t))?$evento->grupos_t:'GRUPOS DE INTERES'}}</a>
                                </li>
                            @endif
                            @if (!$expositore->isEmpty())
                                 <li class="nav-item px-0 px-md-3">
                                    <a class="nav-link acabe" href="#expositores">{{(!empty($evento->expositores_t))?$evento->expositores_t:'EXPOSITORES'}}</a>
                                </li>
                            @endif
                            @if ($evento->inscripcion == 'SI')
                                 <li class="nav-item px-0 px-md-3">
                                    @if (!empty($evento->enlace_boton))
                                        <a class="nav-link acabe" href="{{$evento->enlace_boton}}" target="_blank">{{$evento->nombre_boton}}</a>
                                    @else 
                                        <a class="nav-link acabe" data-toggle="modal" style="cursor: pointer" data-target="#staticBackdrop">{{$evento->nombre_boton}}</a>

                                    @endif
                                </li>
                            @endif

                            <li>
                                @php
                                    $slug = preg_replace('/[^A-Za-z0-9]/', "-", strtolower($evento->nombre));
//                                     $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// dd($actual_link.'');
                                @endphp
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{route('home.evento',array('nombre'=>$ciudad->slug))}}&t=Ekos eventos presenta {{$evento->nombre}}"
                                onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                target="_blank" class="nav-link" title="Compartir en facebook"><i class="icofont-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/share?url={{route('home.evento',array('nombre'=>$ciudad->slug))}}&via=TWITTER_HANDLE&text=Ekos eventos presenta {{$evento->nombre}}"
                                onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                target="_blank" class="nav-link" title="Share on Twitter"><i class="icofont-twitter"></i>
                                </a>
                            </li>
                           

                            
                           
                        </ul>
                    
                    </div>
                </nav>

                {{-- TITULO --}}
                <div class="d-flex justify-content-center pt-1 pt-md-5 ">
                    @if (!empty($evento->logotipo_nombre))
                        <div class="text-center">
                            <img class=" mt-1 mt-md-4 pt-3 img-fluid" src="{{asset('upload/evento/'.$evento->logotipo_nombre) }}" alt="{{$evento->nombre}}">
                        </div>
                    @else
                        <h1 class="text-white titulo-landing-intro mt-1 mt-md-5 pt-5">{{$evento->nombre}}</h1>
                        
                    @endif
                </div>
                {{--FIN DEL TITULO --}}

                <div class="row mt-1 mt-md-3">
                    @if (!$logos->isEmpty())
                    @if ($logosP>0)
                        <div class="col-12 my-3 mt-md-2">
                            <h6 class="presentado_por">{{(!empty($evento->presentado_t))?$evento->presentado_t:'PRESENTADO POR'}}</h6>
                        </div>
                    @endif
                    
                    <div class="col-12 text-center mt-2 wow animate__animated animate__backInLeft animate__delay-1s">
                        
                            @foreach ($logos as $itemLogo)
                                @if ($itemLogo->tipo == 'principal')
                                    @if (!empty( $itemLogo->url ))
                                    <a href="{{$itemLogo->url}}" target="_blank">
                                    <img class="px-2" src="{{asset('upload/logo/'.$itemLogo->imagen)}}" alt="{{$itemLogo->nombre}} - {{$evento->nombre}}" title="{{$itemLogo->nombre}} - {{$evento->nombre}}">

                                    </a>
                                    @else  
                                        <img class="px-2" src="{{asset('upload/logo/'.$itemLogo->imagen)}}" alt="{{$itemLogo->nombre}} - {{$evento->nombre}}" title="{{$itemLogo->nombre}} - {{$evento->nombre}}">

                                    @endif
                                @endif
                            @endforeach
                    </div>
                        @endif


                    {{-- FECHAS DEL EVENTO  --}}
                    <div class="col-12 text-white text-center mt-4 mt-md-4">
                        @if (!empty($ciudad->fecha_descriptiva))
                            <div class="hora-evento-bg">
                                    {{-- @php
                                        if (!empty($ciudad->fecha)) {
                                            $fecha = explode('-',$ciudad->fecha);
                                            $mesArray = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                                            echo $fecha[2].' de '.$mesArray[(int)$fecha[1]-1].' '.$fecha[0];
                                        }
                                        if (!empty($ciudad->fecha_fin)) {
                                            $fecha = explode('-',$ciudad->fecha_fin);
                                            $mesArray = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                                            echo ' al '.$fecha[2].' de '.$mesArray[(int)$fecha[1]-1].' '.$fecha[0];
                                        }
                                        
                                    @endphp --}}
                                    
                                        {{$ciudad->fecha_descriptiva}}
                                
                            </div>
                        @endif

                       @if (!empty($ciudad->hora))
                            <div class="hora-evento-bg mt-3">
                                {{$ciudad->hora}}
                            </div>    
                       @endif
                       
                    </div>
                </div>

                    
            </div>

        </div>
    </div>
</div>