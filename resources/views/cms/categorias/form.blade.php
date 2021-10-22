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
<form id='formulario' action="{{(empty($categoria->created_at))?route('categoria.store'):route('categoria.update',$categoria)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($categoria->created_at)
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
            <input type="text" required name="descripcion" id="descripcion" placeholder="* Nombre" class="form-control" value="{{old('descripcion',$categoria->descripcion)}}">
        </div>

      
        <div class="col-12 mt-3">
           <label class="mr-3"><b>Estado *:</b></label>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="Activo" {{($categoria->estado == 'Activo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline1">Activo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="Inactivo" {{($categoria->estado == 'Inactivo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2">Inactivo</label>
            </div>
        </div>
        <div class="col-12 mt-1 text-right">
            <input type="submit" class="btn btn-primary px-4 nb0 submit" id="btnEnviar" value="Guardar datos">
        </div>
    </div>
</form>