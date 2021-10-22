@extends('layouts.front')

@section('content')
 {!!$evento->analytics!!}

{{-- CABECERA --}}

<div class="container-fluid">

    <div class="row">
        <div class="col-12 p-0 m-0">
            <div class="header-interno-home">
                <div class="text-center">
                    <a href="{{route('home')}}"><img src="{{asset('assets/img/frame-38.png')}}" alt="Ekos Eventos" class="logo-front"></a>
                </div>

                {{-- contenido del header  --}}
                <h1 class="titulo-evento-interno mt-5 pt-5">REGISTRO</h1>


                {{-- fin del contenido del header  --}}
                
            </div>
        </div>
    </div>
</div>
{{-- CABECERA FIN --}}


{{-- CUERPO INICIO --}}
<div class="container">
    
    {{-- FORMULARIO DE REGISTRO  --}}
    <div class="row">


        <div class="col-12">
            <div class="contenido-form">
                <div class="text-center">
                    {!!$evento->textoregistro!!}
                </div>
            </div>
        </div>

        {{-- FORMULARIO DE REGISTRO  --}}
        <div class="col-12 pb-4 ">
           <div class="formulario-registro">
                 
            
                {{-- TABLA DE CONTENIDO --}}
                @if (session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif

                {{-- TABLA DE CONTENIDO --}}
                @if (session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif


                <form id='formulario' action="{{route('home.registrar')}}" method="POST" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <h3><b>Formulario de registro</b></h3>
                    <p>Los campos con (*) son obligatorios.</p>

                    <div class="row">

                        <div class="form-group col-12 col-md-6">
                            <label for="fnombre">Nombres completos</label>
                            <input required type="text" name="nombre" class="form-control" id="fnombre">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="fapellidos">Apellidos completos</label>
                            <input required type="text" name="apellidos" class="form-control" id="fapellidos">
                        </div>

                        @if (!$ubicaciones->isEmpty())
                            <div class="form-group col-12 col-md-6">
                                <label for="fnombre">Ubicación del evento</label>
                                <select required name="ubicacion" id="ubicacion" class="form-control">
                                    <option value="">-- Selecciona una ubicación --</option>
                                    @foreach ($ubicaciones as $itemUb)
                                        <option value="{{$itemUb->ciudad->nombre}}">{{$itemUb->ciudad->nombre}} | {{$itemUb->fecha}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        

                        @if (!empty($miForm))

                            @if($miForm->pais==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="fpais">País</label>
                                    <input  required type="text" name="pais" class="form-control" id="fpais">
                                </div>
                            @endif

                            @if($miForm->cedula==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="fcedula">Cédula de identidad</label>
                                    <input  required type="number" name="cedula" id="cedulatxt" class="form-control cedula   " id="fcedula">
                                </div>
                            @endif

                            @if($miForm->empresa==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="fempresa">Empresa</label>
                                    <input  required type="text" name="empresa" class="form-control  " id="fempresa">
                                </div>
                            @endif

                            @if($miForm->celular==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="fcelular">Teléfono celular</label>
                                    <input  required type="text" maxlength="10" name="celular" id="txtcelular" class="form-control  celular" id="fcelular">
                                </div>
                            @endif

                            @if($miForm->cargo==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="fcargo">Cargo</label>
                                    <input required type="text" name="cargo" class="form-control" id="fcargo">
                                </div>
                            @endif

                            <div class="form-group col-12 col-md-6">
                                <label for="femail">Correo electrónico</label>
                                <input required type="email" name="email" class="form-control" id="femail">
                            </div>

                            @if($miForm->direccion==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="fdireccion">Dirección</label>
                                    <input required type="text" name="direccion" class="form-control" id="fdireccion">
                                </div>
                            @endif

                            @if($miForm->ciudad==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="fciudad">Ciudad</label>
                                    <input required type="text" name="ciudad" class="form-control" id="fciudad">
                                </div>
                            @endif

                             @if($miForm->universidad==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="funiversidad">Universidad</label>
                                    <input required type="text" name="universidad" class="form-control" id="funiversidad">
                                </div>
                            @endif

                            @if($miForm->titulo==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="ftitulo">Titulo universitario / Carrera</label>
                                    <input required type="text" name="titulo" class="form-control" id="ftitulo">
                                </div>
                            @endif

                             @if($miForm->nacimiento==1)
                                <div class="form-group col-12 col-md-6">
                                    <label for="ftitulo">Fecha de nacieminto</label>
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


                        @endif

                        <div class="col-12 text-right">
                            <input type="hidden" name="eventos_id"  value="{{$evento->id}}">
                            <input type="hidden" name="tk"  value="{{$tk}}">
                            <button type="submit" id="btnregistrarfinal" class="btn btn-primary btn-lg">Agregar</button>
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

                        <div class="col-12 mt-4">
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
{{-- FIN DEL CUERPO --}}

@endsection
