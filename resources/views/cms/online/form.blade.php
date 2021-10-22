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
<form id='formulario' action="{{(empty($online->created_at))?route('online.store'):route('online.update',$online)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($online->created_at)
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
           <input type="text" name="titulo" id="" cols="30" rows="3" placeholder="Titulo" class="form-control" value="{{old('titulo',$online->titulo)}} ">
        </div>


         <div class="col-12 mt-3">
            <label class="b" for="descripcioninterna">Descripcion MAX 200 caracteres*</label>
            <textarea name="descripcion" id="descripcion" class="form-control summernot" cols="30" rows="3">{{old('descripcion',$online->descripcion)}}</textarea>
        </div>

        <div class="col-12 mt-3">
            <label class="b" for="descripcioninterna">Enlace/Embed de video *</label>
            <textarea name="video" id="video" class="form-control" cols="30" rows="5">{{old('video',$online->video)}}</textarea>
        </div>

        <div class="COL-12"><hr></div>
       

         <div class="col-6 mt-3">
            <label for=""><b>Fecha desde *</b></label>
            <input type="text" readonly required name="fecha" id="fecha" placeholder="* Fecha" class="form-control fechas" value="{{old('fecha',$online->fecha)}}">
        </div>
         <div class="col-6 mt-3">
            <label for=""><b>Hora del evento*</b></label>
            <input type="time" autocomplete="false"   name="hora" id="hora" placeholder="Hora del evento. EJ: 8:00 a 16:00" class="form-control" value="{{old('hora',$online->hora)}}">
        </div>

        <div class="col-12"><hr></div>

        

     

         <div class="col-6 mt-2">
            <label for=""><b>Enlace externo</b></label>
            <input type="text"  name="enlace" id="enlace" placeholder="Enlace" class="form-control" value="{{old('enlace',$online->enlace)}}">
        </div>

         <div class="col-6 mt-2">
           <label for=""><b>Nombre enlace</b></label>
           <input type="text" name="nombre_enlace" id="" placeholder="Nombre enlace" class="form-control" value="{{old('nombre_enlace',$online->nombre_enlace)}} ">
        </div>

         <div class="col-12 mt-3">
            <label class="b" for="descripcioninterna">Encuesta pegar solo la URL del IFRAME de la encuesta</label>
            <textarea name="modal" id="modal" class="form-control" cols="30" rows="5">{{old('modal',$online->modal)}}</textarea>
        </div>


        <div class="col-12"><hr></div>

       

         {{-- <div class="col-9 col-md-6 mt-4 d-none">
            <label class="b" class=" col-form-label"><b>Imagen POP UP 650x600 </b></label>
            <input  type="file" name="modal" id="modal" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto d-none">
                @php
                    if(!empty($online->modal)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/online/".$online->modal).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div> --}}

         {{-- <div class="col-12 mt-2">
            <label for=""><b>URL POPUP</b></label>
            <input type="text"  name="url_modal" id="url_modal" placeholder="URL POP UP" class="form-control" value="{{old('url_modal',$online->url_modal)}}">
        </div> --}}
        <div class="COL-12"><hr></div>


        <div class="col-12 mt-3">
            <label class="b" for="descripcioninterna">Chat (Eliminar etiquetas marginheight="0" marginwidth="0")</label>
            <textarea name="chat" id="chat" class="form-control" cols="30" rows="5">{{old('chat',$online->chat)}}</textarea>
        </div>

       

       
        <div class="col-12 mt-3">
           <label class="mr-3"><b>Estado* :</b></label>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="Activo" {{($online->estado == 'Activo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline1">Activo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="Inactivo" {{($online->estado == 'Inactivo')?'checked':''}}>
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