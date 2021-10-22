<div id="detalle" class="container-fluid my-0 wow animate__animated animate__fadeIn" style="background: {{$evento->color}}; color:{{$evento->color_fuente}}">
    <div class="container pt-5 pb-4">
        <div class="row">
            <div id="countdown" class="col-12 text-center  wow animate__animated animate__bounceIn animate__delay-1s">
                <label class="texto-espera" style="color:{{$evento->color_fuente}}">
                    Este evento iniciará en....
                    
                    
                    <div class="countdown" >
                        <div class="row">

                            <div class="col text-center" style="color:{{$evento->color_fuente}}">
                                <h6 class="dethor mb-0  text-center" id="dia_d"  style="color:{{$evento->color_fuente}}">12</h6>
                                <span class="mx-auto d-block">Días</span>
                            </div>

                            <div class="col text-center" style="color:{{$evento->color_fuente}}">
                                <h6 class="dethor mb-0  text-center" style="color:{{$evento->color_fuente}}"> : </h6>
                            </div>

                            <div class="col text-center" style="color:{{$evento->color_fuente}}">
                                <h6 class="dethor mb-0  text-center" id="hora_d"  style="color:{{$evento->color_fuente}}">12</h6>
                                <span class="mx-auto d-block">Horas</span>
                            </div>

                            <div class="col text-center" style="color:{{$evento->color_fuente}}">
                                <h6 class="dethor mb-0  text-center" style="color:{{$evento->color_fuente}}"> : </h6>
                            </div>

                            <div class="col text-center" style="color:{{$evento->color_fuente}}">
                                <h6 class="dethor mb-0  text-center" id="min_d"  style="color:{{$evento->color_fuente}}">12</h6>
                                <span class="mx-auto d-block">Minutos</span>
                            </div>

                            <div class="col text-center" style="color:{{$evento->color_fuente}}">
                                <h6 class="dethor mb-0  text-center" style="color:{{$evento->color_fuente}}"> : </h6>
                            </div>

                             <div class="col text-center" style="color:{{$evento->color_fuente}}">
                                <h6 class="dethor mb-0  text-center" id="seg_d"  style="color:{{$evento->color_fuente}}">12</h6>
                                <span class="mx-auto d-block">Segundos</span>
                            </div>
                            
                        </div>
                    </div>


                    @php
                        $orgDate = $ciudad->fecha;  
                        $newDate = date("m/d/Y", strtotime($orgDate));  
                        // echo "New date format is: ".$newDate. " (MM-DD-YYYY)";  
                    @endphp 
                    <input type="hidden" id="fecha_inicio_tm" value="{{$newDate}}  {{$ciudad->timer}}">
                </label>
                {{-- @include('app.boton', array('evento' => $evento) ) --}}
            </div>

            {{-- DETALLE INTRODUCCION  --}}
            <div class="col-12 text-center mt-5  wow animate__animated animate__bounceIn animate__delay-1s">
                <h2 class="text-intro mb-4">{{(!empty($evento->introduccion_t))?$evento->introduccion_t:' '}}</h2>
                <p class="px-3 mt-2 text-intro-p">{!!$evento->introduccion!!}</p>
            </div>
            {{-- FIN DETALLE INTRODUCCION  --}}

            {{-- DETALLE OBJETIVOS  --}}
            <div class="col-12 text-center mt-4  wow animate__animated animate__bounceIn animate__delay-1s">
                <h2 class="text-intro mb-4">{{(!empty($evento->objetivos_t))?$evento->objetivos_t:' '}}</h2>
                @include('app.objetivos', array('evento' => $evento,'objetivos' => $objetivos) )

            </div>
            {{-- FIN DETALLE OBJETIVOS  --}}
        </div>
    </div>
</div>