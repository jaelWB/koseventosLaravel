<div class="container-fluid my-0  wow animate__animated animate__fadeIn" style="background: {{$evento->color}}; color:{{$evento->color_fuente}}">
    <div class="container pt-4 pb-4">
        <div class="row">
            <div class="col-12 text-center">
                
                @include('app.boton', array('evento' => $evento) )
            </div>

        </div>
    </div>
</div>