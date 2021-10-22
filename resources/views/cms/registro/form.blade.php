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
<form id='formulario' action="{{(empty($registro->created_at))?route('registro.store'):route('registro.update',$registro)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($registro->created_at)
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
            <label for=""><b>Nombres *</b></label>
            <input type="text" required name="nombres" id="nombres" class="form-control" value="{{old('nombres',$registro->nombres)}}">
        </div>

        <div class="col-6 mt-2">
            <label for=""><b>apellidos *</b></label>
            <input type="text" required name="apellidos" id="apellidos" class="form-control" value="{{old('apellidos',$registro->apellidos)}}">
        </div>

        <div class="col-6 mt-2">
            <label for=""><b>correo *</b></label>
            <input type="text" required name="correo" id="correo" class="form-control" value="{{old('correo',$registro->correo)}}">
        </div>

        <div class="col-6 mt-2">
            <label for=""><b>titulo *</b></label>
            <input type="text" required name="titulo" id="titulo" class="form-control" value="{{old('titulo',$registro->titulo)}}">
        </div>

        <div class="col-6 mt-2">
            <label for=""><b>Cargo *</b></label>
            <input type="text" required name="cargo" id="cargo"  class="form-control" value="{{old('cargo',$registro->cargo)}}">
        </div>

        <div class="col-6 mt-2">
            <label for=""><b>Cargo estandarizado *</b></label>
            <select name="cargos_estandarizados_id" id="cargos_estandarizados_id" class="form-control">
                @foreach ($model as $item)
                    <option value="{{$item->id}}">{{ $item->descripcion}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-6 mt-2">
            <label for=""><b>Empresa *</b></label>
            <input type="text" required name="empresa" id="empresa" class="form-control" value="{{old('empresa',$registro->empresa)}}">
        </div>


        <div class="col-6 mt-2">
            <label for=""><b>Celular *</b></label>
            <input type="text" required name="celular" id="celular"  class="form-control" value="{{old('celular',$registro->celular)}}">
        </div>

         <div class="col-6 mt-2">
            <label for=""><b>Telefono *</b></label>
            <input type="text" required name="telefono" id="telefono"  class="form-control" value="{{old('telefono',$registro->telefono)}}">
        </div>

         <div class="col-6 mt-2">
            <label for=""><b>Direccion *</b></label>
            <input type="text" required name="direccion" id="direccion"  class="form-control" value="{{old('direccion',$registro->direccion)}}">
        </div>

        <div class="col-6 mt-2">
            <label for=""><b>Ciudad *</b></label>
            <input type="text" required name="ciudad" id="ciudad" class="form-control" value="{{old('ciudad',$registro->ciudad)}}">
        </div>

        <div class="col-12 mt-3">
           <label class="mr-3"><b>Genero* :</b></label>
            <div class="custom-control custom-radio custom-control-inlisne">
                <input required type="radio" id="customRadioInline1" name="genero" class="custom-control-input" value="Femenino" {{($registro->genero == 'Femenino')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline1">Femenino</label>
            </div>
            <div class="custom-control custom-radio custom-control-isnline">
                <input required type="radio" id="customRadioInline2" name="genero" class="custom-control-input" value="Masculino" {{($registro->genero == 'Masculino')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2">Masculino</label>
            </div>
            <div class="custom-control custom-radio custom-control-insline">
                <input required type="radio" id="customRadioInline21" name="genero" class="custom-control-input" value="Otro" {{($registro->genero == 'Otro')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline21">Otro</label>
            </div>
           
        </div>
         <div class="col-12 mt-2">
             <label for=""><b>Especifique otro genero *</b></label>
            <input type="text"  name="otro_genero" id="otro_genero"  class="form-control" value="{{old('otro_genero',$registro->otro_genero)}}">
        </div>

        <div class="col-12 mt-3">
           <label class="mr-3"><b>Rango de edad* :</b></label>
            <div class="custom-control custom-radio custom-control-inlsine">
                <input required type="radio" id="customRadioInline11" name="rango_edad" class="custom-control-input" value="18 a 24 años" {{($registro->rango_edad == '18 a 24 años')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline11">18 a 24 años</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlisne">
                <input required type="radio" id="customRsadioInline21" name="rango_edad" class="custom-control-input" value="25 a 34 años" {{($registro->rango_edad == '25 a 34 años')?'checked':''}}>
                <label class="custom-control-label" for="customRsadioInline21">25 a 34 años</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlinse">
                <input required type="radio" id="customRadioInline2111" name="rango_edad" class="custom-control-input" value="35 a 44 años" {{($registro->rango_edad == '35 a 44 años')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2111">35 a 44 años</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlsine">
                <input required type="radio" id="customRadioInline2114" name="rango_edad" class="custom-control-input" value="45 a 60 años" {{($registro->rango_edad == '45 a 60 años')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2114">45 a 60 años</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlisne">
                <input required type="radio" id="customRadioInline2113" name="rango_edad" class="custom-control-input" value="Más de 61 años" {{($registro->rango_edad == 'Más de 61 años')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2113">Más de 61 años</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlisne">
                <input required type="radio" id="customRadioInline2112" name="rango_edad" class="custom-control-input" value="Menos de 18 años" {{($registro->rango_edad == 'Menos de 18 años')?'checked':''}}>
                <label class="custom-control-label" for="customRadioInline2112">Menos de 18 años</label>
            </div>
           
        </div>

         <div class="col-12 mt-3">
           <label class="mr-3"><b>Como se enteró* :</b></label>
            <div class="custom-control custom-radio custom-control-inlinse">
                <input required type="radio" id="1customRadioInline1" name="entero" class="custom-control-input" value="Redes sociales" {{($registro->entero == 'Redes sociales')?'checked':''}}>
                <label class="custom-control-label" for="1customRadioInline1">Redes sociales</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlisne">
                <input required type="radio" id="2customRadioInline2" name="entero" class="custom-control-input" value="Email" {{($registro->entero == 'Email')?'checked':''}}>
                <label class="custom-control-label" for="2customRadioInline2">Email</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlsine">
                <input required type="radio" id="3customRadioInline21" name="entero" class="custom-control-input" value="Buscadores" {{($registro->entero == 'Buscadores')?'checked':''}}>
                <label class="custom-control-label" for="3customRadioInline21">Buscadores</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlisne">
                <input required type="radio" id="31customRadioInline21" name="entero" class="custom-control-input" value="Revista Ekos impresa" {{($registro->entero == 'Revista Ekos impresa')?'checked':''}}>
                <label class="custom-control-label" for="31customRadioInline21">Revista Ekos impresa</label>
            </div>
            <div class="custom-control custom-radio custom-control-isnline">
                <input required type="radio" id="32customRadioInline21" name="entero" class="custom-control-input" value="Llamada telefónica" {{($registro->entero == 'Llamada telefónica')?'checked':''}}>
                <label class="custom-control-label" for="32customRadioInline21">Llamada telefónica</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlisne">
                <input required type="radio" id="33customRadioInline21" name="entero" class="custom-control-input" value="Portal Web Ekos" {{($registro->entero == 'Portal Web Ekos')?'checked':''}}>
                <label class="custom-control-label" for="33customRadioInline21">Portal Web Ekos</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlisne">
                <input required type="radio" id="34customRadioInline21" name="entero" class="custom-control-input" value="Otro" {{($registro->entero == 'Otro')?'checked':''}}>
                <label class="custom-control-label" for="34customRadioInline21">Otro</label>
            </div>
           
        </div>

        <div class="col-12 mt-2">
             <label for=""><b>Especifique otra metodo como se enteró *</b></label>
            <input type="text"  name="otro_entero" id="otro_entero"  class="form-control" value="{{old('otro_entero',$registro->otro_entero)}}">
        </div>

        <div class="col-12 mt-3">
           <label class="mr-3"><b>Desea recibir* :</b></label>
            <div class="custom-control custom-radio custom-control-inlinse">
                <input type="checkbox" id="kcustomRadioInline1" name="desea1" class="custom-control-input" value="Si, Ekos Sostenible" {{($registro->desea1 == 'Si, Ekos Sostenible')?'checked':''}}>
                <label class="custom-control-label" for="kcustomRadioInline1">Si, Ekos Sostenibleenino</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlinse">
                <input  type="checkbox" id="k1customRadioInline2" name="desea2" class="custom-control-input" value=" Si, Ekos Today" {{($registro->desea2 == ' Si, Ekos Today')?'checked':''}}>
                <label class="custom-control-label" for="k1customRadioInline2"> Si, Ekos Today</label>
            </div>
            <div class="custom-control custom-radio custom-control-inlinse">
                <input  type="checkbox" id="k2customRadioInline21" name="desea3" class="custom-control-input" value="No" {{($registro->desea3 == 'No')?'checked':''}}>
                <label class="custom-control-label" for="k2customRadioInline21">No</label>
            </div>
           
        </div>

      
        
        <div class="col-12 mt-3 text-right">
            <input type="submit" class="btn btn-primary px-4 nb0 submit" id="btnEnviar" value="Guardar datos">
        </div>
    </div>
</form>