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
<form id='formulario' action="{{(empty($publicidad->created_at))?route('publicidad.store'):route('publicidad.update',$publicidad)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($publicidad->created_at)
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
           <label for=""><b>Nombre Máximo 50 caracteres *</b></label>
           <input type="text" name="nombre" id="" cols="30" rows="3" placeholder="Nombre" class="form-control" value="{{old('nombre',$publicidad->nombre)}} ">
        </div>

        

        <div class="col-12 mt-3">
            <label for=""><b>Tipo * </b></label>
            {{-- lista de categorias  --}}
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="">-- Selecciona una opción --</option>
                <option {{(!empty($publicidad->tipo) && $publicidad->tipo=='Horizontal')?'selected':''}} value="Horizontal">Horizontal</option>
                <option {{(!empty($publicidad->tipo) && $publicidad->tipo=='Lateral')?'selected':''}} value="Lateral">Lateral</option>
                <option {{(!empty($publicidad->tipo) && $publicidad->tipo=='Horizontal Inferior')?'selected':''}} value="Horizontal Inferior">Horizontal Inferior</option>

            </select>
            {{-- lista de categorias  --}}

        </div>

          <div class="col-9 col-md-6 mt-4">
            <label class="b" class=" col-form-label"><b>* Imagen </b></label>
            <input {{(empty($publicidad->imagen))?'required':''}} type="file" name="imagen" id="imagen" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($publicidad->imagen)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/publicidad/".$publicidad->imagen).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>

        
       

         <div class="col-12 mt-2">
            <label for=""><b>URL</b></label>
            <input type="text"  name="url" id="url" placeholder="URL" class="form-control" value="{{old('url',$publicidad->url)}}">
        </div>

       

       
        <div class="col-12 mt-3">
           <label class="mr-3"><b>Estado* :</b></label>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="Activo" {{($publicidad->estado == 'Activo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline1">Activo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="Inactivo" {{($publicidad->estado == 'Inactivo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2">Inactivo</label>
            </div>
        </div>
        <div class="col-12 mt-1 text-right">
            <hr>
            <input type="hidden" name="eventos_id" value="{{$evento->id}}">
            <input type="submit" class="btn btn-primary px-3 nb0 submit" id="btnEnviar" value="Guardar">
        </div>
    </div>
</form>