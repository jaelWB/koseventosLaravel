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
<form id='formulario' action="{{(empty($expositore->created_at))?route('expositore.store'):route('expositore.update',$expositore)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($expositore->created_at)
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
            <input type="text" required name="nombre" id="nombre" placeholder="* Nombre" class="form-control" value="{{old('nombre',$expositore->nombre)}}">
        </div>

        <div class="col-12 mt-2">
            <label for=""><b>Rol / Tiítulo *</b></label>
            <input type="text" required name="tipo" id="tipo" placeholder="Rol o titulo" class="form-control" value="{{old('tipo',$expositore->tipo)}}">
        </div>

        <div class="col-12 mt-2">
           <label for=""><b>Cargo</b></label>
           <textarea name="resumen" id="" cols="30" rows="3" placeholder="Resumen" class="form-control">{{old('resumen',$expositore->resumen)}}</textarea>
            {{-- <input type="text"  name="resumen" id="resumen" placeholder="Cargo - empresa" class="form-control" value="{{old('resumen',$expositore->resumen)}}"> --}}

        </div>

        


        <div class="col-9 col-md-6 mt-2">
            <label class="b" class=" col-form-label"><b>* Imagen de la expositore 535x490</b></label>
            <input {{(empty($expositore->imagen))?'required':''}} type="file" name="imagen" id="imagen" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($expositore->imagen)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/expositores/".$expositore->imagen).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>
        
        {{-- <div class="col-12 mt-2">
            <hr>
        </div>

        <div class="col-6 mt-2">
            <input type="text" name="linkedin" id="linkedin" placeholder="Enlace Linkedin" class="form-control" value="{{old('linkedin',$expositore->linkedin)}}">
        </div>
        <div class="col-6 mt-2">
            <input type="text" name="instagram" id="instagram" placeholder="Enlace Instagram" class="form-control" value="{{old('instagram',$expositore->instagram)}}">
        </div>
        <div class="col-6 mt-2">
            <input type="text" name="facebook" id="facebook" placeholder="Enlace Facebook" class="form-control" value="{{old('facebook',$expositore->facebook)}}">
        </div>
        <div class="col-6 mt-2">
            <input type="text" name="url" id="ul" placeholder="Enlace URL personal" class="form-control" value="{{old('url',$expositore->url)}}">
        </div>
        <div class="col-6 mt-2">
            <input type="text" name="twitter" id="twitter" placeholder="Twitter personal" class="form-control" value="{{old('twitter',$expositore->twitter)}}">
        </div> --}}
        

        <div class="col-12 mt-2">
            <hr>
        </div>

        <div class="col-12 mt-3">
           <label class="mr-3"><b>Estado *:</b></label>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="Activo" {{($expositore->estado == 'Activo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline1">Activo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="Inactivo" {{($expositore->estado == 'Inactivo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2">Inactivo</label>
            </div>
        </div>
         <div class="col-12 text-right mt-1">
            <hr>

            <input type="submit" class="btn btn-primary nb0 submit" id="btnEnviar" value="Guardar datos">
            <input type="hidden" name="eventos_id" value="{{$evento->id}}">
        </div>
    </div>
</form>