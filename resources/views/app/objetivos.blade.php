 @if (!$objetivos->isEmpty())
    <div class="container  wow animate__animated animate__fadeIn" style="background: {{$evento->color}}; color:{{$evento->color_fuente}}">
        <div class="row">
            @foreach ($objetivos as $item)
                <div class="col-12 col-md-4 mb-3 mb-md-2 text-left">
                    <p class="mb-0">
                        <i class="icofont-long-arrow-right"></i>{!!$item->descripcion!!}
                    </p>
                    @if (!empty($item->autor))
                        <h6 class="mt-0" style="color: {{$evento->color_botones}}">{{$item->autor}}</h6>
                    @endif
                    @if (!empty($item->url) && !empty($item->texto_url))

                    <a class="btn btn-sm mt-2" style="background: {{$evento->color_botones}}; color: {{$evento->color_fuente_botones}}" href="{{$item->url}}" target="_blank">{{$item->texto_url}}</a>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
@endif 