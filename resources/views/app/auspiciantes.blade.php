<div class="container-fluid px-0">
    <div class="container p-0  wow animate__animated animate__fadeIn">

        {{-- AUSPICIANTES  --}}
        @php
            $cont  = app\Logo::where('tipo','auspiciado')->where('estado','Activo')->count();
        @endphp
        @if ($cont>0)
            <div class="row mx-0">
                <div class="col-12 text-center">
                    {{-- titulo de auspiciantes  --}}
                    <label style="background: {{$evento->color_botones}}; color: {{$evento->color_fuente_botones}}" class="titulo_auspiciante_new px-4">{{(!empty($evento->auspiciado_t))?$evento->auspiciado_t:'AUSPICIADO POR'}}</label>
                    {{-- fin titulo de auspiciantes  --}}
                </div>
                <div class="col-12 my-3 text-center wow animate__animated animate__bounceIn animate__delay-1s">
                    @if (!$logos->isEmpty())
                        @foreach ($logos as $itemLogo)
                            @if ($itemLogo->tipo =='auspiciado')
                                 @if (!empty( $itemLogo->url ))
                                    <a href="{{$itemLogo->url}}" target="_blank">
                                            <img class="p-2" src="{{asset('upload/logo/'.$itemLogo->imagen)}}" alt="{{$itemLogo->nombre}} - {{$evento->nombre}}" title="{{$itemLogo->nombre}} - {{$evento->nombre}}">

                                    </a>
                                    @else  
                                        <img class="p-2" src="{{asset('upload/logo/'.$itemLogo->imagen)}}" alt="{{$itemLogo->nombre}} - {{$evento->nombre}}" title="{{$itemLogo->nombre}} - {{$evento->nombre}}">

                                    @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        @endif

        {{--FIN AUSPICIANTES  --}}


        {{-- AUSPICIANTES  --}}
        @php
            $cont  = app\Logo::where('tipo','inferior')->where('estado','Activo')->count();
        @endphp
        @if ($cont>0)
            <div class="row mx-0">
                
                <div class="col-12 my-3 text-center wow animate__animated animate__bounceIn animate__delay-1s">
                    @if (!$logos->isEmpty())
                        @foreach ($logos as $itemLogo)
                            @if ($itemLogo->tipo =='inferior')
                             @if (!empty( $itemLogo->url ))
                                <a href="{{$itemLogo->url}}" target="_blank">
                                    <img class="p-2" src="{{asset('upload/logo/'.$itemLogo->imagen)}}" alt="{{$itemLogo->nombre}} - {{$evento->nombre}}" title="{{$itemLogo->nombre}} - {{$evento->nombre}}">
                                </a>
                                @else  
                                    <img class="p-2" src="{{asset('upload/logo/'.$itemLogo->imagen)}}" alt="{{$itemLogo->nombre}} - {{$evento->nombre}}" title="{{$itemLogo->nombre}} - {{$evento->nombre}}">
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        @endif

        {{--FIN AUSPICIANTES  --}}


    </div>
</div>