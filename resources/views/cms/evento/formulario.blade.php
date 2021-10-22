@extends('layouts.app')
@section('content')
    <h1 class="titulo-index">ASIGNA LOS CAMPOS DEL FORMULARIO PARA EL EVENTO: <b>{{$evento->nombre}}</b></h1>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 p-0">
                <a type="button" class="btn btn-warning btn-sm" href="{{route('evento.index')}}"><i class="icofont-long-arrow-left"></i> Regresar al administrador</a>
            </div>

            <div class="col-12 p-0 mt-4">
                  @if (session('status'))
                        <div class="alert alert-info">{{session('status')}}</div>
                    @endif
                <form  id='formulario' action="{{route('evento.salvarcampos')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <table class="table table-bordered table-hover bg table-striped">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th scope="col">Descripción</th>
                            <th scope="col">Opción</th>
                        </tr>
                    </thead>
                     <tbody id="tablaC">
                        
                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de nombres PAÍS</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlinepais1" name="pais" class="custom-control-input" {{($miform->pais == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinepais1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlinepais2" name="pais" class="custom-control-input" {{($miform->pais == '0' || empty($miform->pais))?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinepais2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de nombres CÉDULA</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlinecedula1" name="cedula" class="custom-control-input" {{($miform->cedula == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinecedula1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlinecedula2" name="cedula" class="custom-control-input" {{($miform->cedula == '0' || empty($miform->cedula))?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinecedula2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Activar el campo de nombres EMPRESA</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlineempresa1" name="empresa" class="custom-control-input" {{($miform->empresa == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlineempresa1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlineempresa2" name="empresa" class="custom-control-input" {{($miform->empresa == '0' || empty($miform->empresa) )?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlineempresa2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de nombres CELULAR</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlinecelular1" name="celular" class="custom-control-input" {{($miform->celular == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinecelular1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlinecelular2" name="celular" class="custom-control-input" {{($miform->celular == '0' || empty($miform->celular) )?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinecelular2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de nombres CARGO</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlinecargo1" name="cargo" class="custom-control-input"  {{($miform->cargo == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinecargo1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlinecargo2" name="cargo" class="custom-control-input"  {{($miform->cargo == '0' || empty($miform->cargo) )?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinecargo2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>
                       
                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de nombres DIRECCIÖN</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlinedireccion1" name="direccion" class="custom-control-input" {{($miform->direccion == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinedireccion1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlinedireccion2" name="direccion" class="custom-control-input" {{($miform->direccion == '0' || empty($miform->direccion) )?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinedireccion2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de nombres CIUDAD</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlineciudad1" name="ciudad" class="custom-control-input" {{($miform->ciudad == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlineciudad1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlineciudad2" name="ciudad" class="custom-control-input" {{($miform->ciudad == '0' || empty($miform->ciudad) )?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlineciudad2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de nombres TITULO</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlinetitulo1" name="titulo" class="custom-control-input" {{($miform->titulo == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinetitulo1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlinetitulo2" name="titulo" class="custom-control-input"  {{($miform->titulo == '0' || empty($miform->titulo) )?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinetitulo2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>
                         <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de nombres UNIVERSIDAD</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlineuniversidad1" name="universidad" class="custom-control-input" {{($miform->universidad == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlineuniversidad1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlineuniversidad2" name="universidad" class="custom-control-input" {{($miform->universidad == '0' || empty($miform->universidad) )?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlineuniversidad2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de nombres FECHA DE NACIMIENTO</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="customRadioInlinenacimiento1" name="nacimiento" class="custom-control-input" {{($miform->nacimiento == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinenacimiento1">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="customRadioInlinenacimiento2" name="nacimiento" class="custom-control-input" {{($miform->nacimiento == '0' || empty($miform->nacimiento) )?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInlinenacimiento2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>

                         <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de FORMAS DE ASISTENCIA</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="Casistencia" name="asistencia" class="custom-control-input"  {{($miform->asistencia == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="Casistencia">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="Casistencia2" name="asistencia" class="custom-control-input" {{($miform->asistencia == '0' || empty($miform->asistencia) )?'checked':''}}>
                                    <label class="custom-control-label" for="Casistencia2">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de TELÉFONO CONVENCIONAL</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="Ctelefono23" name="telefono" class="custom-control-input"  {{($miform->telefono == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="Ctelefono23">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="Ctelefono223" name="telefono" class="custom-control-input" {{($miform->telefono == '0' || empty($miform->telefono) )?'checked':''}}>
                                    <label class="custom-control-label" for="Ctelefono223">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de GÉNERO</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="Cgenero" name="genero" class="custom-control-input"  {{($miform->genero == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="Cgenero">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="Cgenero1" name="genero" class="custom-control-input" {{($miform->genero == '0' || empty($miform->genero) )?'checked':''}}>
                                    <label class="custom-control-label" for="Cgenero1">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de EDAD</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="Cedad" name="edad" class="custom-control-input"  {{($miform->edad == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="Cedad">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="Cedad1" name="edad" class="custom-control-input" {{($miform->edad == '0' || empty($miform->edad) )?'checked':''}}>
                                    <label class="custom-control-label" for="Cedad1">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de EDUCACIÓN</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="Ceducacion" name="educacion" class="custom-control-input"  {{($miform->educacion == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="Ceducacion">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="Ceducacion1" name="educacion" class="custom-control-input" {{($miform->educacion == '0' || empty($miform->educacion) )?'checked':''}}>
                                    <label class="custom-control-label" for="Ceducacion1">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de COMO SE ENTERÓ</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="Centero" name="entero" class="custom-control-input"  {{($miform->entero == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="Centero">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="Centero1" name="entero" class="custom-control-input" {{($miform->entero == '0' || empty($miform->entero) )?'checked':''}}>
                                    <label class="custom-control-label" for="Centero1">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><i class="icofont-long-arrow-right"></i> Activar el campo de NOTIFICACIONES EN WHATSAPP</td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="Cwhatsapp" name="whatsapp" class="custom-control-input"  {{($miform->whatsapp == '1')?'checked':''}}>
                                    <label class="custom-control-label" for="Cwhatsapp">Visualizar en el formulario</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" id="Cwhatsapp1" name="whatsapp" class="custom-control-input" {{($miform->whatsapp == '0' || empty($miform->whatsapp) )?'checked':''}}>
                                    <label class="custom-control-label" for="Cwhatsapp1">No visualizar en el formulario</label>
                                </div>
                            </td>
                        </tr>



                       
                    </tbody>
                </table>

                 <div class="text-right">
                     <hr>
                    <input type="hidden" name="eventos_id" value="{{$evento->id}}">
                     <button type="submit" class="btn px-3 btn-primary">Guardar datos</button>
                </div>
                </form>
            </div>

        </div>
    </div>
@endsection