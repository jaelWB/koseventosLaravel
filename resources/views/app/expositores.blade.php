@if (!$expositore->isEmpty())
    <div id="expositores" class="container-fluid my-0  wow animate__animated animate__fadeIn" style="background: {{$evento->color_expositores}}; color:{{$evento->color_texto_expositores}}">
        <div class="container pt-5 pb-4">
            <div class="row">
                <div class="col-12 text-center mb-4 wow animate__animated animate__bounceIn animate__delay-1s">
                    <label class="texto-espera-titulo" style="color:{{$evento->color_texto_expositores}}">
                        <i class="icofont-ui-user d-block mb-2"></i>
                        {{(!empty($evento->expositores_t))?$evento->expositores_t:'EXPOSITORES'}} 
                    </label>
                </div>

               <div class="col-12 text-center wow animate__animated animate__bounceIn animate__delay-1s">
                   {{$evento->introduccion_expositores}}
               </div>

           
            </div>
            @if (!empty($evento->embed))
                <div class="row">

                    <div class="col-12 col-md-8">
                        <div class="row d-flex justify-content-center mt-5">
                            @foreach ($expositore as $item)
                                <div class="card-expo  text-left mb-3 bg-white wow animate__animated animate__bounceIn animate__delay-1s" style="border: 1px solid #e4e4e4">
                                    <div class="row" >
                                        <div class="col-4 text-center">
                                            <img src="{{asset('upload/expositores/'.$item->imagen)}}" alt="{{$item->nombre}}" title="{{$item->nombre}}" class="img-fluid">
                                        </div>
                                        <div class="col-8 p-0">
                                                <h4 class="mt-4 pt-2 mb-0 texto-grupo" style="color:{{$evento->color_texto_expositores}}">{{$item->nombre}}</h4>
                                                <h5 class="mt-1 mb-0 texto-grupo" style="color:{{$evento->color_texto_expositores}}; font-weight:100; font-size:14px">{{$item->tipo}}</h5>
                                             

                                        </div>
                                         @if (!empty($item->resumen))
                                            <div class="col-12 px-4">

                                                <p class=" text-justify" style="color:{{$evento->color_texto_expositores}}; font-weight:100; font-size:13px">{{$item->resumen}}</p>
                                            </div>
                                            
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 col-md-4 pt-5">
                         {!!$evento->embed!!}
                    </div>

                </div>
            @else
                
                <div class="row d-flex justify-content-center mt-5">
                    @foreach ($expositore as $item)
                        <div class="card-expo text-left mb-3 bg-white wow animate__animated animate__bounceIn animate__delay-1s" style="border: 1px solid #e4e4e4">
                            <div class="row" >
                                <div class="col-4 text-center">
                                    <img src="{{asset('upload/expositores/'.$item->imagen)}}" alt="{{$item->nombre}}" title="{{$item->nombre}}" class="img-fluid">
                                </div>
                                <div class="col-8 p-0">
                                        <h4 class="mt-4 pt-2 mb-0 texto-grupo" style="color:{{$evento->color_texto_expositores}}">{{$item->nombre}}</h4>
                                        <h5 class="mt-1 texto-grupo" style="color:{{$evento->color_texto_expositores}}; font-weight:100; font-size:14px">{{$item->tipo}}</h5>
                                         

                                </div>
                                @if (!empty($item->resumen))
                                <div class="col-12 px-4">

                                    <p class=" text-justify" style="color:{{$evento->color_texto_expositores}}; font-weight:100; font-size:13px">{{$item->resumen}}</p>
                                </div>
                                    
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>


            @endif
            
        </div>
    </div>
@endif