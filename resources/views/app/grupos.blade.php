@if (!$conferencias->isEmpty())
    <div id="grupos" class="container-fluid my-0  wow animate__animated animate__fadeIn" style="background: {{$evento->color_expositores}}; color:{{$evento->color_texto_expositores}}">
        <div class="container pt-5 pb-4">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <label class="texto-espera-titulo" style="color:{{$evento->color_texto_expositores}}">
                        <i class="icofont-users-alt-3 d-block mb-2"></i>
                        {{(!empty($evento->grupos_t))?$evento->grupos_t:'GRUPOS DE INTERES'}} 
                    </label>
                </div>

               

           
            </div>
            <div class="row d-flex justify-content-center pb-4">
                 @foreach ($conferencias as $item)
                    @if (empty($item->url))
                        <div class="col-6 col-md-3 text-center wow animate__animated animate__bounceIn animate__delay-1s">
                        <img src="{{asset('upload/conferencia/'.$item->imagen)}}" alt="{{$item->nombre}}" title="{{$item->nombre}}" class="img-fluid">
                        <h4 class="mt-3 texto-grupo" style="color:{{$evento->color_texto_expositores}}">{{$item->nombre}}</h4>
                        @if (!empty($item->descripcion))
                            <p class="mt-1 texto-grupo" style="color:{{$evento->color_texto_expositores}}"><b>{{$item->descripcion}}</b></p>
                        @endif
                    </div>
                    @else
                        <div class="col-6 col-md-3 text-center wow animate__animated animate__bounceIn animate__delay-1s">
                            <a href="{{$item->url}}" target="_blank">
                                
                                <img src="{{asset('upload/conferencia/'.$item->imagen)}}" alt="{{$item->nombre}}" title="{{$item->nombre}}" class="img-fluid">
                                <h4 class="mt-3 texto-grupo" style="color:{{$evento->color_texto_expositores}}">{{$item->nombre}}</h4>
                                 @if (!empty($item->descripcion))
                                    <p class="mt-1 texto-grupo" style="color:{{$evento->color_texto_expositores}}"><b>{{$item->descripcion}}</b></p>
                                @endif
                            </a>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif