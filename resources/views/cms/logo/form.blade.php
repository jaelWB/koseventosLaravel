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
<form id='formulario' action="{{(empty($logo->created_at))?route('logo.store'):route('logo.update',$logo)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($logo->created_at)
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
        
        
        <div class="col-6 mt-2">
            <select required name="tipo" id="tipo" class="form-control">
                <option value="">-- Selecciona el tipo de auspiciante -- </option>
                <option {{($logo->tipo == 'principal'?'selected':'')}} value="principal">Auspiciante Principal</option>
                <option {{($logo->tipo == 'auspiciado'?'selected':'')}} value="auspiciado">Auspiciante Secundario</option>
                <option {{($logo->tipo == 'inferior'?'selected':'')}} value="inferior">Tercer nivel</option>
            </select>
        </div>

        <div class="col-6 mt-2">
            <input type="text" required name="nombre" id="nombre" placeholder="* Nombre" class="form-control" value="{{old('nombre',$logo->nombre)}}">
        </div>


        <div class="col-9 col-md-6 mt-4">
            <label class="b" class=" col-form-label"><b>* Imagen/Banner del LOGO Máximo (Principal: 120x45px | Secundario: 75x29| Tercer nivel: 62x15 )</b></label>
            <input {{(empty($logo->imagen))?'required':''}} type="file" name="imagen" id="imagen" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($logo->imagen)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/logo/".$logo->imagen).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>

         <div class="col-12 mt-2">
            <input type="text"  name="url" id="url" placeholder="URL del logotipo" class="form-control" value="{{old('url',$logo->url)}}">
        </div>

         <div class="col-12 mt-2">
            <input type="number"  name="orden" id="orden" placeholder="ORDEN del logotipo" class="form-control" value="{{old('orden',$logo->orden)}}">
        </div>
        
        <div class="col-12 mt-3">
           <label class="mr-3"><b>Estado:</b></label>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="Activo" {{($logo->estado == 'Activo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline1">Activo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="Inactivo" {{($logo->estado == 'Inactivo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2">Inactivo</label>
            </div>
        </div>
        <div class="col-12 mt-1 text-right">
            <hr>
            <input type="hidden" name="eventos_id" value="{{$evento->id}}">
            <input type="submit" class="btn btn-primary px-3 nb0 submit" id="btnEnviar" value="Guardar datos">
        </div>
    </div>
</form>