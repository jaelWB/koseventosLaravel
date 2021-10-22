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
<form id='formulario' action="{{(empty($conferencia->created_at))?route('conferencia.store'):route('conferencia.update',$conferencia)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($conferencia->created_at)
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
            <label for=""><b>Nombre</b></label>
            <input type="text" required name="nombre" id="nombre" placeholder="* Nombre" class="form-control" value="{{old('nombre',$conferencia->nombre)}}">
        </div>

        <div class="col-12 mt-2">
           <label for=""><b>Descripcion Máximo 250 caracteres</b></label>
           <textarea name="descripcion" id="" cols="30" rows="3" placeholder="Descripción" class="form-control">{{old('descripcion',$conferencia->descripcion)}}</textarea>
        </div>

        


        <div class="col-9 col-md-6 mt-2">
            <label class="b" class=" col-form-label"><b>* Imagen de la conferencia 350x265</b></label>
            <input {{(empty($conferencia->imagen))?'required':''}} type="file" name="imagen" id="imagen" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($conferencia->imagen)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/conferencia/".$conferencia->imagen).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>


        <div class="col-12 mt-2">
            <label for=""><b>URL</b></label>
            <input type="text"  name="url" id="url" placeholder="URL" class="form-control" value="{{old('url',$conferencia->url)}}">
        </div>
        
        <div class="col-12 mt-3">
           <label class="mr-3"><b>Estado* :</b></label>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="Activo" {{($conferencia->estado == 'Activo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline1">Activo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="Inactivo" {{($conferencia->estado == 'Inactivo')?'checked':''}}>
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