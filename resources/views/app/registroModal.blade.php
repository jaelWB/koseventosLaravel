<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center text-dark" id="staticBackdropLabel"><b class="text-center d-block">Formulario de inscripción</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">

              {{-- FORMULARIO DE REGISTRO  --}}
                <div class="row  bg-light">


                    

                    {{-- FORMULARIO DE REGISTRO  --}}
                    <div class="col-12 pb-4 ">
                        <div class="formulario-registro bg-light">
                                
                            
                                {{-- TABLA DE CONTENIDO --}}
                                @if (session('status'))
                                    <div class="alert alert-info">{{session('status')}}</div>
                                @endif

                                {{-- TABLA DE CONTENIDO --}}
                                @if (session('error'))
                                    <div class="alert alert-danger">{{session('error')}}</div>
                                @endif


                                <form id='formulario' action="{{route('home.registrar')}}" method="POST" enctype="multipart/form-data" class="px-2">
                                    @csrf

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Todos los campos del formulario son obligatorios.</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-12 col-md-6">
                                            <label style="color: #000;font-weight:bold" for="fnombre">Nombres completos</label>
                                            <input required type="text" name="nombre" class="form-control" id="fnombre">
                                        </div>

                                        <div class="form-group col-12 col-md-6">
                                            <label style="color:  #000;font-weight:bold" for="fapellidos">Apellidos completos</label>
                                            <input required type="text" name="apellidos" class="form-control" id="fapellidos">
                                        </div>

                                        <div class="form-group col-12 col-md-6">
                                            <label style="color:  #000;font-weight:bold" for="femail">Correo electrónico</label>
                                            <input required type="email" name="email" class="form-control" id="femail">
                                        </div>


                                        {{-- @if (!$ubicaciones->isEmpty())
                                            <div class="form-group col-12 col-md-6">
                                                <label style="color: {{$evento->color_botones}};font-weight:bold" for="fnombre">Ubicación del evento</label>
                                                <select required name="ubicacion" id="ubicacion" class="form-control">
                                                    <option value="">-- Selecciona una ubicación --</option>
                                                    @foreach ($ubicaciones as $itemUb)
                                                        <option value="{{$itemUb->ciudad->nombre}}">{{$itemUb->ciudad->nombre}} | {{$itemUb->fecha}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif --}}
                                        

                                        @if (!empty($miForm))

                                            @if($miForm->pais==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fpais">País</label>
                                                    <input  required type="text" name="pais" class="form-control" id="fpais">
                                                </div>
                                            @endif

                                            @if($miForm->cedula==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcedula">Cédula de identidad</label>
                                                    <input  required type="number" name="cedula" id="cedulatxt" class="form-control cedula   " id="fcedula">
                                                </div>
                                            @endif

                                            @if($miForm->empresa==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fempresa">Empresa</label>
                                                    <input  required type="text" name="empresa" class="form-control  " id="fempresa">
                                                </div>
                                            @endif

                                            @if($miForm->celular==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcelular">Teléfono celular</label>
                                                    <input  required type="text" maxlength="10" name="celular" id="txtcelular" class="form-control  celular" id="fcelular">
                                                </div>
                                            @endif

                                            @if($miForm->cargo==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcargo">Cargo</label>
                                                    <input required type="text" name="cargo" class="form-control" id="fcargo">
                                                </div>
                                            @endif

                                          
                                            @if($miForm->direccion==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fdireccion">Dirección</label>
                                                    <input required type="text" name="direccion" class="form-control" id="fdireccion">
                                                </div>
                                            @endif

                                            @if($miForm->ciudad==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fciudad">Ciudad</label>
                                                    <input required type="text" name="ciudad" class="form-control" id="fciudad">
                                                </div>
                                            @endif

                                            @if($miForm->universidad==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="funiversidad">Universidad</label>
                                                    <input required type="text" name="universidad" class="form-control" id="funiversidad">
                                                </div>
                                            @endif

                                            @if($miForm->titulo==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="ftitulo">Titulo universitario / Carrera</label>
                                                    <input required type="text" name="titulo" class="form-control" id="ftitulo">
                                                </div>
                                            @endif

                                            @if($miForm->nacimiento==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="ftitulo">Fecha de nacieminto</label>
                                                    {{-- AÑO  --}}
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <select name="anio" id="anio" class="form-control" required>
                                                                <option value="">--AÑO --</option>
                                                                @for ($i = 1920; $i < date('Y'); $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-4">
                                                            <select name="mes" id="mes" class="form-control" required>
                                                                <option value="">-- MES --</option>
                                                                <option value="01">Enero</option>
                                                                <option value="02">Febrero</option>
                                                                <option value="03">Marzo</option>
                                                                <option value="04">Abril</option>
                                                                <option value="05">Mayo</option>
                                                                <option value="06">Junio</option>
                                                                <option value="07">Julio</option>
                                                                <option value="08">Agosto</option>
                                                                <option value="09">Septiembre</option>
                                                                <option value="10">Octubre</option>
                                                                <option value="11">Noviembre</option>
                                                                <option value="12">Diciembre</option>
                                                            
                                                            </select>
                                                        </div>

                                                        <div class="col-4">
                                                            <select name="dia" id="dias" class="form-control" required>
                                                                <option value="">-- DÍA --</option>
                                                                @for ($i = 1; $i < 31; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- FIN DE AÑO  --}}
                                                </div>
                                            @endif

                                            @if($miForm->telefono==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcelular">Teléfono convencional</label>
                                                    <input  required type="text" maxlength="10" name="telefono" id="txttelefono" class="form-control ">
                                                </div>
                                            @endif

                                            @if($miForm->asistencia==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcelular">¿Desea asistir de manera presencial o virtual? </label>
                                                    <div class="form-check">
                                                        <input required class="form-check-input" type="radio" name="asistencia" id="asistencia1" value="Presencial">
                                                        <label class="form-check-label" for="asistencia1">
                                                            Presencial
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="asistencia" id="asistencia2" value="Virtual">
                                                        <label class="form-check-label" for="asistencia2">
                                                            Virtual
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($miForm->edad==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcelular">Edad</label>
                                                    <select name="edad" id="edad" class="form-control" required>
                                                        <option value="">-- Selecciona una opción -- </option>
                                                        <option value="Menos de 17 años">Menos de 17 años</option>
                                                        <option value=" 18 a 24 años"> 18 a 24 años</option>
                                                        <option value="25 a 34 años">25 a 34 años</option>
                                                        <option value="35 a 44 años">35 a 44 años</option>
                                                        <option value="45 a 60 años">45 a 60 años</option>
                                                        <option value="Más de 61 años">Más de 61 años</option>
                                                    </select>
                                                    


                                                    
                                                </div>
                                            @endif

                                            @if($miForm->educacion==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcelular">Nivel Educativo</label>
                                                    <select name="educacion" id="educacion" class="form-control" required>
                                                        <option value="">-- Selecciona una opción -- </option>
                                                        <option value="Básico">Básico</option>
                                                        <option value="Secundario">Secundario</option>
                                                        <option value="Superior">Superior</option>
                                                        <option value="Técnico">Técnico</option>
                                                        <option value="Postgrado">Postgrado</option>
                                                    </select>
                                                </div>
                                            @endif

                                            @if($miForm->genero==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcelular">Género</label>
                                                    <select name="genero" id="genero" class="form-control" required>
                                                        <option value="">-- Selecciona una opción -- </option>
                                                        <option value="Femenino">Femenino</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Otro">Otro</option>
                                                    </select>
                                                    <input type="text" name="txtgenero" id="txtgenero" class="form-control mt-2 d-none" placeholder="Especifique el género">
                                                </div>
                                            @endif

                                            @if($miForm->entero==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcelular">¿Cómo se enteró de este evento? </label>
                                                    <select name="entero" id="entero" class="form-control" required>
                                                        <option value="">-- Selecciona una opción -- </option>
                                                        <option value="Redes sociales">Redes sociales</option>
                                                        <option value="Email">Email</option>
                                                        <option value="Buscadores">Buscadores</option>
                                                        <option value="Revista impresa">Revista impresa</option>
                                                        <option value="Llamada telefónica">Llamada telefónica</option>
                                                        <option value="Postal web">Portal web</option>
                                                        <option value="Otros">Otros</option>


                                                    </select>
                                                    <input type="text" name="txtentero" id="txtentero" class="form-control mt-2 d-none" placeholder="Especifique como se enteró">
                                                </div>
                                            @endif

                                            @if($miForm->whatsapp==1)
                                                <div class="form-group col-12 col-md-6">
                                                    <label style="color:  #000;font-weight:bold" for="fcelular">¿Desea recibir en su whatsapp (de forma gratuita) nuestros micronoticieros de negocios?</label>
                                                    
                                                    <div class="form-group options">
                                                        <div class="form-check">
                                                            <input required class="form-check-input chkwaths" name="whatsapp[]" type="checkbox" value="Si, Ekos Today" id="whatsapp1">
                                                            <label class="form-check-label" for="whatsapp1">
                                                                Si, Ekos Today
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input required class="form-check-input chkwaths" name="whatsapp[]" type="checkbox" value="Si, Ekos Sostenible" id="whatsapp2">
                                                            <label class="form-check-label" for="whatsapp2">
                                                                Si, Ekos Sostenible
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input required class="form-check-input chkwaths" name="whatsapp[]" type="checkbox" value="Si, Datta News" id="whatsapp3">
                                                            <label class="form-check-label" for="whatsapp3">
                                                                Si, Datta News
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input required class="form-check-input chkwaths" name="whatsapp[]" type="checkbox" value="Si, Pulso Constructor" id="whatsapp4">
                                                            <label class="form-check-label" for="whatsapp4">
                                                                Si, Pulso Constructor
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input required class="form-check-input chkwaths" name="whatsapp[]" type="checkbox" value="Si, Flash Ferretero" id="whatsapp5">
                                                            <label class="form-check-label" for="whatsapp5">
                                                                Si, Flash Ferretero
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input required class="form-check-input chkwaths" name="whatsapp[]" type="checkbox" value="No, gracias." id="whatsapp6">
                                                            <label class="form-check-label" for="whatsapp6">
                                                                No, gracias.
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif


                                        @endif

                                        <div class="col-12 text-center">
                                            <input type="hidden" name="eventos_id"  value="{{$evento->id}}">
                                            <input type="hidden" name="ubicacion"  value="{{$ciudad->ciudades_id}}">
                                            <input type="hidden" name="tk"  value="{{$tk}}">
                                            <button type="submit" id="btnregistrarfinal" class="btn btn-dark btn-lg" style="background: {{$evento->color_botones}}; color: {{$evento->color_fuente_botones}}">INSCRIBIRME</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                    {{-- FIN DEL FORMULARIO DE REGISTRO  --}}

                    @if ($evento->multipleregistro ==1 && !empty($asociados))
                        @if (!$asociados->isEmpty())
                            <div class="col-12 text-center my-4">
                                <h4 class="text-center mt-3"><b>LISTA DE INSCRITOS</b></h4>
                            </div>
                            <div class="col-12 mb-5">
                                <div class="row">

                                    @foreach ($asociados as $aso)
                                        <div class="col-4 ">
                                            <div class="bg-inscrito">
                                                <div class="row">
                                                    <div class="col-10 text-center">
                                                        <h4 class="mt-3">{{$aso->nombre}}</h4>
                                                    </div>
                                                    <div class="col-2 mt-3">
                                                            <a onclick = "if (! confirm('¿Estás seguro que deseas eliminar? Es probable que esta información deje de aparecer para los usuarios')) { return false; }"  
                                                            href="{{route('home.eliminar',array('lead'=>$aso->id))}}" class="text-danger"><i class="icofont-trash"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col-12 mt-5">
                                        <div class="mas-info-btn text-center">
                                            <div>
                                                <a href="{{route('home.finalizar',md5($evento->id))}}" class="btnregistrar">Finalizar registros</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif

                </div>
                {{-- FIN DEL FORMULARIO DE REGISTRO  --}}

      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div> --}}
    </div>
  </div>
</div>