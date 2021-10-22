@if ($errors->any())
    <div class="validate-errors bg-danger">
        <h3><i class="icofont-ban"></i> Se debe validar la siguiente información antes de continuar</h3>
        <ul>
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
        </ul>
    </div>
@endif
<h5 class="mt-3 mb-3"><b>Completa los datos del formulario</b></h5>
<hr>
<form id='formulario' action="{{(empty($evento->created_at))?route('evento.store'):route('evento.update',$evento)}}" method="POST"  enctype="multipart/form-data">
    @csrf
     @if ($evento->created_at)
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
            <label for=""><b>Categoría * </b></label>
            {{-- lista de categorias  --}}
            <select name="categorias_id" id="categorias_id" class="form-control" required>
                <option value="">-- Selecciona una opción --</option>
                @if (!$categorias->isEmpty())
                    @php
                        $act='';        
                    @endphp
                    @foreach ($categorias as $item)
                        @if ($item->id == $evento->categorias_id)
                            @php $act='selected'; @endphp
                        @else
                            @php $act=''; @endphp
                        @endif
                        <option {{$act}} value="{{$item->id}}">{{$item->descripcion}}</option>
                    @endforeach
                @endif
            </select>
            {{-- lista de categorias  --}}

        </div>

        <div class="col-6 mt-2">
            <label for=""><b>Nombre del evento *</b></label>
            <input type="text" required name="nombre" id="nombre" placeholder="* Nombre" class="form-control" value="{{old('nombre',$evento->nombre)}}">
        </div>

        <div class="col-3 mt-3">
            <label for=""><b>Color Bg de los eventos descripcion</b></label><br>
            <input type="color"  name="color" id="color" value="{{old('color',$evento->color)}}">
        </div>

         <div class="col-3 mt-3">
            <label for=""><b>Color BG de los botones</b></label><br>
            <input type="color"  name="color_botones" id="color_botones" value="{{old('color_botones',$evento->color_botones)}}">
        </div>

         <div class="col-3 mt-3">
            <label for=""><b>Color de la letra </b></label><br>
            <input type="color"  name="color_fuente" id="color_fuente" value="{{old('color_fuente',$evento->color_fuente)}}">
        </div>
        <div class="col-3 mt-3">
            <label for=""><b>Color de la letra de los botones </b></label><br>
            <input type="color"  name="color_fuente_botones" id="color_fuente_botones" value="{{old('color_fuente_botones',$evento->color_fuente_botones)}}">
        </div>

        <div class="col-3 mt-3">
            <label for=""><b>Color de fondo de agenda </b></label><br>
            <input type="color"  name="color_agenda" id="color_agenda" value="{{old('color_agenda',$evento->color_agenda)}}">
        </div>
      

         <div class="col-3 mt-3">
            <label for=""><b>Color de texto de agenda </b></label><br>
            <input type="color"  name="color_texto_agenda" id="color_texto_agenda" value="{{old('color_texto_agenda',$evento->color_texto_agenda)}}">
        </div>

        <div class="col-3 mt-3">
            <label for=""><b>Color de fondo de expositores </b></label><br>
            <input type="color"  name="color_expositores" id="color_expositores" value="{{old('color_expositores',$evento->color_expositores)}}">
        </div>

        <div class="col-3 mt-3">
            <label for=""><b>Color de texto de expositores </b></label><br>
            <input type="color"  name="color_texto_expositores" id="color_texto_expositores" value="{{old('color_texto_expositores',$evento->color_texto_expositores)}}">
        </div>



        {{-- <div class="col-4 mt-3">
            <label for=""><b>Hora del evento*</b></label>
            <input type="text"  name="hora" id="hora" placeholder="Hora del evento. EJ: 8:00 a 16:00" class="form-control" value="{{old('hora',$evento->hora)}}">
        </div>

         <div class="col-4 mt-3">
            <label for=""><b>Fecha desde *</b></label>
            <input type="text" readonly required name="inicio" id="inicio" placeholder="* Fecha de inicio" class="form-control fechas" value="{{old('inicio',$evento->inicio)}}">
        </div>

         <div class="col-4 mt-3">
            <label for=""><b>Fecha finalización *</b></label>
            <input type="text" readonly required name="fin" id="fin" placeholder="* Fecha de finalización" class="form-control fechas" value="{{old('fin',$evento->fin)}}">
        </div> --}}


        <div class="col-12 mt-3">
            <label class="b" for="descripcioninterna">Introducción</label>
            <textarea name="introduccion" id="introduccion" class="form-control summernot" cols="30" rows="3">{{old('introduccion',$evento->introduccion)}}</textarea>
        </div>

        <div class="col-9 col-md-6 mt-3">
            <label class="b" class=" col-form-label"><b>Logotipo inicial en cabecera (anchox200)</b></label>
            <input type="file" name="logotipo_nombre" id="logotipo_nombre" class="form-control ">
                            
        </div>

        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($evento->logotipo_nombre)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->logotipo_nombre).'" width="100px" class="mx-auto"></div>';
                        echo '<br><input class="ml-2" type="checkbox" name="quitarLogo" value="1"><span class="ml-1">ELiminar logo</span> ';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>




        <div class="col-9 col-md-6 mt-3">
            <label class="b" class=" col-form-label"><b>Imagen/Banner del evento home (1110x474 | 540X371)*</b></label>
            <input {{(empty($evento->imagen))?'required':''}} type="file" name="imagen" id="imagen" class="form-control ">
                            
        </div>

        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($evento->imagen)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->imagen).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>
        <div class="col-9 col-md-6 mt-2">
            <label class="b" class=" col-form-label"><b>Imagen interna del evento 1440x615 (Máx. en Jpg o PNG)*</b></label>
            <input  {{(empty($evento->imagen_interna))?'required':''}} type="file" name="imagen_interna" id="imagen_interna" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($evento->imagen_interna)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->imagen_interna).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>

         <div class="col-12">
            <hr>
        </div>

        <div class="col-9 col-md-6 mt-3">
            <label class="b" class=" col-form-label"><b>Imagen de la agenda (1440xalto deseado)</b></label>
            <input  type="file" name="imagen_agenda" id="imagen_agenda" class="form-control ">
                            
        </div>

        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($evento->imagen_agenda)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->imagen_agenda).'" width="100px" class="mx-auto"></div>';
                        echo '<br><input class="ml-2" type="checkbox" name="quitarAgenda" value="1"><span class="ml-1">ELiminar imagen</span> ';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>
        <div class="col-9 col-md-6 mt-2">
            <label class="b" class=" col-form-label"><b>Imagen agenda responsive (520Xalto deseado)</b></label>
            <input type="file" name="agenda_responsive" id="agenda_responsive" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($evento->agenda_responsive)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->agenda_responsive).'" width="100px" class="mx-auto"></div>';
                        echo '<br><input class="ml-2" type="checkbox" name="quitarAgendaR" value="1"><span class="ml-1">ELiminar imagen</span> ';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>

        
        
        <div class="col-12">
            <hr>
            <h5><b>Banners internos</b></h5>
            <h6>Primer banner</h6>
        </div>
        <div class="col-12 mt-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="primer-tab" data-toggle="tab" href="#primer" role="tab" aria-controls="primer" aria-selected="true">Diseño por defecto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="segundo-tab" data-toggle="tab" href="#segundo" role="tab" aria-controls="segundo" aria-selected="false">Campo HTML enriquecido</a>
                </li>
            </ul>
                <div class="tab-content bg-light p-3 border" id="myTabContent">
                    <div class="tab-pane fade show active" id="primer" role="tabpanel" aria-labelledby="primer-tab">

                        <div class="row">
                            <div class="col-9 col-md-6 mt-2">


                                <label class="b" class=" col-form-label"><b>Imagen fondo primer banner (1440x248)</b></label>
                                <input  type="file" name="banner_promocional" id="banner_promocional" class="form-control ">
                                                
                            </div>
                            <div class="col-3 d-flex align-items-center text-center mx-auto ">
                                    @php
                                        if(!empty($evento->banner_promocional)){
                                            echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->banner_promocional).'" width="100px" class="mx-auto"></div>';
                                        }else{
                                            echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                                        }
                                    @endphp
                            </div>
                             <div class="col-12 mt-3">
                                <label class="b" for="descripcioninterna">Titulo banner promocional</label>
                                <input type="text"   name="titulo_banner_promocional" id="titulo_banner_promocional" placeholder="Titulo del primer banner" class="form-control " value="{{old('titulo_banner_promocional',$evento->titulo_banner_promocional)}}">

                            </div>

                            {{-- BOTON DEL BANNER UNO  --}}
                            <div class="col-6 mt-3">
                                <label class="b" for="descripcioninterna">Titulo del botón del banner</label>
                                <input type="text"   name="texto_boton_banner_uno" id="texto_boton_banner_uno" class="form-control " value="{{old('texto_boton_banner_uno',$evento->texto_boton_banner_uno)}}">

                            </div>
                            <div class="col-6 mt-3">
                                <label class="b" for="descripcioninterna">Enlace del botón </label>
                                <input type="text"   name="boton_banner_uno" id="boton_banner_uno"  class="form-control " value="{{old('boton_banner_uno',$evento->boton_banner_uno)}}">

                            </div>
                            {{-- FIN BOTON DEL BANNER UNO  --}}


                            <div class="col-12 mt-3">
                                <label class="b" for="descripcioninterna">Contenido del primer banner</label>
                                <textarea name="texto_banner_uno" id="texto_banner_uno" class="form-control summernot" cols="30" rows="3">{{old('texto_banner_uno',$evento->texto_banner_uno)}}</textarea>
                            </div>


                        </div>

                    </div>
                    <div class="tab-pane fade" id="segundo" role="tabpanel" aria-labelledby="segundo-tab">
                        <div class="col-12 mt-2">
                            <label class="b" for="seccion_banner">Primer banner (HTML)</label>
                            <textarea name="seccion_banner" id="seccion_banner" class="form-control summernotes" cols="30" rows="3">{{old('seccion_banner',$evento->seccion_banner)}}</textarea>
                        </div>
                    </div>
                </div>
        </div>


         <div class="col-12">
             <h6 class="mt-4">Segundo banner</h6>
         </div>

        <div class="col-12 mt-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="primerB-tab" data-toggle="tab" href="#primerB" role="tab" aria-controls="primerB" aria-selected="true">Diseño por defecto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="segundoB-tab" data-toggle="tab" href="#segundoB" role="tab" aria-controls="segundoB" aria-selected="false">Campo HTML enriquecido</a>
                </li>
            </ul>
            <div class="tab-content bg-light p-3 border" id="myTabContent">
                <div class="tab-pane fade show active" id="primerB" role="tabpanel" aria-labelledby="primerB-tab">

                    <div class="row">
                        <div class="col-9 col-md-6 mt-2">


                            <label class="b" class=" col-form-label"><b>Imagen fondo segundo banner (1440x445)</b></label>
                            <input  type="file" name="banner_secundario" id="banner_secundario" class="form-control ">
                                            
                        </div>
                        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                                @php
                                    if(!empty($evento->banner_secundario)){
                                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->banner_secundario).'" width="100px" class="mx-auto"></div>';
                                    }else{
                                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                                    }
                                @endphp
                        </div>
                        <div class="col-12 mt-3">
                            <label class="b" for="descripcioninterna">Titulo segundo banner promocional</label>
                            <input type="text"   name="titulo_banner_secundario" id="titulo_banner_secundario" placeholder="Titulo del segundo banner" class="form-control " value="{{old('titulo_banner_secundario',$evento->titulo_banner_secundario)}}">

                        </div>

                        {{-- BOTON DEL BANNER DOS  --}}
                        <div class="col-6 mt-3">
                            <label class="b" for="descripcioninterna">Titulo del botón del banner</label>
                            <input type="text"   name="boton_banner_dos" id="boton_banner_dos" class="form-control " value="{{old('boton_banner_dos',$evento->boton_banner_dos)}}">

                        </div>
                        <div class="col-6 mt-3">
                            <label class="b" for="descripcioninterna">Enlace independiente</label>
                            <input type="text"   name="enlace_banner_dos" id="enlace_banner_dos"  class="form-control " value="{{old('enlace_banner_dos',$evento->enlace_banner_dos)}}">

                        </div>
                        {{-- FIN BOTON DEL BANNER DOS  --}}




                        <div class="col-12 mt-3">
                            <label class="b" for="descripcioninterna">Contenido del segundo banner</label>
                            <textarea name="contenido_banner_secundario" id="contenido_segundo_banner" class="form-control summernot" cols="30" rows="3">{{old('contenido_banner_secundario',$evento->contenido_banner_secundario)}}</textarea>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="segundoB" role="tabpanel" aria-labelledby="segundoB-tab">
                    <div class="col-12 mt-2">
                        <label class="b" for="seccion_banner">Segundo banner (HTML)</label>
                        <textarea name="seccion_banner_secundario" id="seccion_banner_secundario" class="form-control summernotes" cols="30" rows="3">{{old('seccion_banner_secundario',$evento->seccion_banner_secundario)}}</textarea>
                    </div>
                </div>
            </div>
            <hr>
        </div>




        {{-- <div class="col-12 mt-2">
            <label class="b" for="descripciontematica">Descripción interna de la temática</label>
            <textarea name="descripciontematica" id="descripciontematica" class="form-control summernote" cols="30" rows="3">{{old('descripciontematica',$evento->descripciontematica)}}</textarea>
        </div> --}}
      
          <div class="col-12 mt-3">
            <label class="b" for="textoregistro">Texto de la pantalla de registro</label>
            <textarea name="texto_registro" id="texto_registro" class="form-control " cols="30" rows="3">{{old('texto_registro',$evento->texto_registro)}}</textarea>
        </div>
        <div class="col-12 mt-3">
            <label class="b" for="descripcioninterna">Texto introductivo de expositores</label>
            <textarea name="introduccion_expositores" id="introduccion_expositores" class="form-control summernot" cols="30" rows="3">{{old('introduccion_expositores',$evento->introduccion_expositores)}}</textarea>
        </div>
        
        {{-- IMAGEN MODAL  --}}
         <div class="col-9 col-md-6 mt-2">
            <label class="b" class=" col-form-label"><b>Imagen de modal (popUp) 600x535</b></label>
            <input type="file" name="imagen_modal" id="imagen_modal" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($evento->imagen_modal)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->imagen_modal).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>
         <div class="col-12 mt-2">
            <label for=""><b>Enlace del modal</b></label>
            <input type="text"  name="enlace_modal" id="enlace_modal" placeholder="Url del modal" class="form-control" value="{{old('enlace_modal',$evento->enlace_modal)}}">
        </div>
        {{-- FIN IMAGEN MODAL  --}}
        
        <div class="col-12">
            <hr>
        </div>


          {{-- IMAGEN FONDO GRACIAS  --}}
         <div class="col-9 col-md-6 mt-2">
            <label class="b" class=" col-form-label"><b>Imagen de fondo de página gracias Mínimo 1440x1024</b></label>
            <input type="file" name="imagen_gracias" id="imagen_gracias" class="form-control ">
                            
        </div>
        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($evento->imagen_gracias)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->imagen_gracias).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>
        {{-- FIN IMAGEN FONDO GRACIAS  --}}

         <div class="col-12">
            <hr>
        </div>
        
        
         <div class="col-6 mt-3">
            <label class="b" for="textoregistro">Código embebidos</label>
            <textarea name="embed" id="embed" class="form-control " cols="30" rows="3">{{old('embed',$evento->embed)}}</textarea>
        </div>

         <div class="col-6 mt-3">
            <label class="b" for="textoregistro">Código Google Analytics</label>
            <textarea name="analytics" id="analytics" class="form-control " cols="30" rows="3">{{old('analytics',$evento->analytics)}}</textarea>
        </div>


        {{-- CONFIGURACION DEL BOTON  --}}
        <div class="col-12">
            <hr>
        </div>
        <div class="col-6 mt-3">
            <label class="b" for="descripcioninterna">Nombre del botón de inscripción general</label>
            <input type="text"   name="nombre_boton" id="nombre_boton" class="form-control " value="{{old('nombre_boton',$evento->nombre_boton)}}">

        </div>
        <div class="col-6 mt-3">
            <label class="b" for="descripcioninterna">Enlace del botón de inscripción general (ingresar solo si el formulario es independiente)</label>
            <input type="text"   name="enlace_boton" id="enlace_boton"  class="form-control " value="{{old('enlace_boton',$evento->enlace_boton)}}">

        </div>
        {{-- FIN CONFIGURACION DEL BOTON--}}

<div class="col-12">
            <hr>
        </div>

        <div class="col-9 col-md-6 mt-3">
            <label class="b" class=" col-form-label"><b>Imagen Responsive home (350x165)</b></label>
            <input  type="file" name="mobil" id="mobil" class="form-control ">
                            
        </div>

        <div class="col-3 d-flex align-items-center text-center mx-auto ">
                @php
                    if(!empty($evento->mobil)){
                        echo '<div class="card border w-100 mt-3 py-3 text-center"><img src="'.asset("upload/evento/".$evento->mobil).'" width="100px" class="mx-auto"></div>';
                    }else{
                        echo '<div class="card border w-100 p-5 mt-3 text-center"><b> ESPERANDO IMAGEN</b></div>';

                    }
                @endphp
        </div>


        {{-- CONFIGURACION DE TITULOS  --}}
        <div class="col-12">
            <hr>
            <h4><b>Configuración de titulos de la página</b></h4>
        </div>


        <div class="col-3 mt-3">
            <label class="b" for="descripcioninterna">Titulo PRESENTADO POR</label>
            <input type="text"   name="presentado_t" id="presentado_t" class="form-control " value="{{old('presentado_t',$evento->presentado_t)}}">

        </div>

        <div class="col-3 mt-3">
            <label class="b" for="descripcioninterna">Titulo AUSPICIADO POR</label>
            <input type="text"   name="auspiciado_t" id="auspiciado_t" class="form-control " value="{{old('auspiciado_t',$evento->auspiciado_t)}}">

        </div>

        <div class="col-3 mt-3">
            <label class="b" for="descripcioninterna">Titulo INTRODUCCION</label>
            <input type="text"   name="introduccion_t" id="introduccion_t" class="form-control " value="{{old('introduccion_t',$evento->introduccion_t)}}">

        </div>

        <div class="col-3 mt-3">
            <label class="b" for="descripcioninterna">Titulo OBJETIVOS</label>
            <input type="text"   name="objetivos_t" id="objetivos_t" class="form-control " value="{{old('objetivos_t',$evento->objetivos_t)}}">

        </div>

        <div class="col-3 mt-3">
            <label class="b" for="descripcioninterna">Titulo AGENDA</label>
            <input type="text"   name="agenda_t" id="agenda_t" class="form-control " value="{{old('agenda_t',$evento->agenda_t)}}">

        </div>

         <div class="col-3 mt-3">
            <label class="b" for="descripcioninterna">Titulo GRUPOS</label>
            <input type="text"   name="grupos_t" id="grupos_t" class="form-control " value="{{old('grupos_t',$evento->grupos_t)}}">

        </div>

         <div class="col-3 mt-3">
            <label class="b" for="descripcioninterna">Titulo EXPOSITORES</label>
            <input type="text"   name="expositores_t" id="expositores_t" class="form-control " value="{{old('expositores_t',$evento->expositores_t)}}">

        </div>
        
        {{-- FIN CONFIGURACION TITULOS--}}




         <div class="col-12">
            <hr>
        </div>
         <div class="col-2 mt-4">
             <label for=""><b>Costo del evento</b></label>
            <input type="number" step="0.01"  name="costo" id="costo" placeholder=" Costo del evento" class="form-control" value="{{old('costo',$evento->costo)}}">
        </div>

        <div class="col-2 mt-4">
           <label class="mr-3"><b>Permite inscribirse*:</b></label>
            <div class="custom-control custom-radio ">
                <input required type="radio" id="customRadioInline11" name="inscripcion" class="custom-control-input" value="SI" {{($evento->inscripcion == 'SI')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline11">SI</label>
            </div>
            <div class="custom-control custom-radio ">
                <input required type="radio" id="customRadioInline21" name="inscripcion" class="custom-control-input" value="NO" {{($evento->inscripcion == 'NO')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline21">NO</label>
            </div>
        </div>

        {{-- <div class="col-2 mt-4">
           <label class="mr-3"><b>Registro multiple:</b></label>
            <div class="custom-control custom-radio ">
                <input required type="radio" id="multipleregistros" name="multiple_registro" class="custom-control-input" value="1" {{($evento->multiple_registro == '1')?'checked':''}}>
                <label class="custom-control-label" for="multipleregistros">Si</label>
            </div>
            <div class="custom-control custom-radio ">
                <input required type="radio" id="customRadioInline2multipleregistro" name="multiple_registro" class="custom-control-input" value="0" {{($evento->multiple_registro == '0')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2multipleregistro">No</label>
            </div>
        </div> --}}

         <div class="col-2 mt-4">
           <label class="mr-3"><b>Ver en home*</b></label>
            <div class="custom-control custom-radio ">
                <input required type="radio" id="multipleregissstros" name="presentacion" class="custom-control-input" value="1" {{($evento->presentacion == '1')?'checked':''}}>
                <label class="custom-control-label" for="multipleregissstros">Normal</label>
            </div>
            <div class="custom-control custom-radio">
                <input required type="radio" id="customRadioInline2multiplsseregistro" name="presentacion" class="custom-control-input" value="2" {{($evento->presentacion == '2')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2multiplsseregistro">Dos espacios</label>
            </div>
             <div class="custom-control custom-radio">
                <input required type="radio" id="customRadioInline2multiplsseregistro3" name="presentacion" class="custom-control-input" value="3" {{($evento->presentacion == '3')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2multiplsseregistro3">Completo</label>
            </div>
        </div>

        <div class="col-2 mt-4">
           <label class="mr-3"><b>Tipo de evento*</b></label>
            <div class="custom-control custom-radio ">
                <input required type="radio" id="modalidad1" name="modalidad" class="custom-control-input" value="Presencial" {{($evento->modalidad == 'Presencial')?'checked':''}}>
                <label class="custom-control-label" for="modalidad1">Presencial</label>
            </div>
            <div class="custom-control custom-radio">
                <input required type="radio" id="modalidad2" name="modalidad" class="custom-control-input" value="Virtual" {{($evento->modalidad == 'Virtual')?'checked':''}}>
                <label class="custom-control-label" for="modalidad2">Virtual</label>
            </div>
             <div class="custom-control custom-radio">
                <input required type="radio" id="modalidad3" name="modalidad" class="custom-control-input" value="VP" {{($evento->modalidad == 'VP')?'checked':''}}>
                <label class="custom-control-label" for="modalidad3">Virtual y Presencial</label>
            </div>
        </div>

        <div class="col-2 mt-4">
           <label class="mr-3"><b>Estado*:</b></label>
            <div class="custom-control custom-radio">
                <input required type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="Activo" {{($evento->estado == 'Activo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline1">Activo</label>
            </div>
            <div class="custom-control custom-radio">
                <input required type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="Inactivo" {{($evento->estado == 'Inactivo')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2">Inactivo</label>
            </div>
        </div>
        <div class="col-12 mt-4 text-right">
            <hr>
            <input type="submit" class="btn btn-primary nb0 submit px-3" id="btnEnviar" value="Guardar evento">
        </div>
    </div>
</form>