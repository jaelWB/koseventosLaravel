@if ($errors->any())
    <div class="validate-errors">
        <h3><i class="icofont-ban"></i> Se debe validar la siguiente información antes de continuar</h3>
        <ul>
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
        </ul>
    </div>
@endif
<h5 class="mt-5 mb-3"><b>Completa los datos del formulario</b></h5>
<hr>
<form id='formulario' action="{{(empty($ciudade->created_at))?route('ciudade.store'):route('ciudade.update',$ciudade)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($ciudade->created_at)
        @method('PATCH')
    @endif
     <div class="row bg-white p-4 border mx-1">

        {{-- ALERTA DE MENSAJES OBLIGATORIOS  --}}
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Recuerda que los campos marcados con asterisco (*) <strong class="text-danger">son obligatorios.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        {{-- ALERTA DE MENSAJES OBLIGATORIOS  --}}
        
        <div class="col-12 mt-2">
            <label for=""><b>Nombre *</b></label>
            <input type="text" required name="nombre" id="nombre" placeholder="* Nombre" class="form-control" value="{{old('nombre',$ciudade->nombre)}}">
        </div>

        {{-- <div class="col-9 col-md-6 mt-2">
            <label class="b" class=" col-form-label"><b>* Imagen Máximo 1158x170px (altura máxima siempre 85px)</b></label>
            <input {{(empty($ciudade->imagen))?'required':''}} type="file" name="imagen" id="imagen" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($ciudade->imagen)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/ciudades/".$ciudade->imagen).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div> --}}

        <div class="col-12 mt-3">
           <label class="mr-3"><b>Estado *:</b></label>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="Activo" {{($ciudade->estado == 'Activo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline1">Activo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="Inactivo" {{($ciudade->estado == 'Inactivo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2">Inactivo</label>
            </div>
        </div>
        <div class="col-12 text-right mt-1">
            <input type="submit" class="btn btn-primary nb0 submit" id="btnEnviar" value="Guardar datos">
        </div>
    </div>
</form>