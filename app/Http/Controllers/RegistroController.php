<?php

namespace App\Http\Controllers;

use App\Registro;
use App\User;
use App\CargosEstandarizado;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Exports\RegistroExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   
    public function index()
    {
         ValidacionesController::soloADMIN();

        $model = Registro::orderby('id','DESC')->get();
        return view('cms.registro.index',array('model'=>$model));
    }

   
    public function create()
    {
         ValidacionesController::soloADMIN();

        $registro = new Registro();
        $model = CargosEstandarizado::orderby('id','ASC')->where('estado','Activo')->get();

        return view('cms.registro.create',array('registro'=>$registro, 'model'=>$model));
    }

    
    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:registros'],
            'titulo' => 'required',
            'cargo' => 'required',
            'empresa' => 'required',
            'celular' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'ciudad' => 'required',
            'rango_edad' => 'required',
            'entero' => 'required',
            'cargos_estandarizados_id' => 'required',

        ]);

        $desea1 = null;
        if(!empty($request->get('desea1'))){
            $desea1 = $request->get('desea1').'|';
        }

         $desea2 = null;
        if(!empty($request->get('desea2'))){
            $desea2 = $request->get('desea2').'|';
        }

         $desea3 = null;
        if(!empty($request->get('desea3'))){
            $desea3 = $request->get('desea3').'|';
        }

        $model= Registro::create(
            array(
                'nombres' => $request->get('nombres'),
                'apellidos' => $request->get('apellidos'),
                'correo' => $request->get('correo'),
                'titulo' => $request->get('titulo'),
                'cargo' => $request->get('cargo'),
                'empresa' =>$request->get('empresa'),
                'celular' => $request->get('celular'),
                'telefono' =>$request->get('telefono'),
                'direccion' => $request->get('direccion'),
                'genero' => $request->get('genero'),
                'ciudad' => $request->get('ciudad'),
                'rango_edad' => $request->get('rango_edad'),
                'entero' => $request->get('entero'),
                'cargos_estandarizados_id' =>$request->get('cargos_estandarizados_id'),
                'otro_genero' =>$request->get('otro_genero'),
                'otro_entero' =>$request->get('otro_entero'),
                'desea' =>$desea1.$desea2.$desea3,
                
            )
        );
        if($model->id > 0){
            $user = User::create([
                'name' => $model->nombres.' '.$model->apellidos,
                'email' => $model->correo,
                'password' => Hash::make(date('Y')),
                'rol' => 'En vivo',
                'registros_id' => $model->id,
                'estado' => 'Activo',
            ]);
            if($user->id){
                if(EmailController::emailUserAccount($user, 'Acceso a Ekos Eventos En Vivo', date('Y') )){
                    
                }
            }
        }

        return redirect()->route('registro.index')->with('status','Nueva REGISTRO almacenado exitosamente.');

    }

    
    public function edit(Registro $registro)
    {
        ValidacionesController::soloADMIN();

        $model = CargosEstandarizado::orderby('id','ASC')->where('estado','Activo')->get();

        return view('cms.registro.edit',array('registro'=>$registro,'model'=>$model));
    }

    
    public function update(Request $request, Registro $registro)
    {
         ValidacionesController::soloADMIN();

        $request->validate([
           'nombres' => 'required',
            'apellidos' => 'required',
            'correo' => 'required',
            'titulo' => 'required',
            'cargo' => 'required',
            'empresa' => 'required',
            'celular' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'ciudad' => 'required',
            'rango_edad' => 'required',
            'entero' => 'required',
            'cargos_estandarizados_id' => 'required',
        ]);

          $desea1 = null;
        if(!empty($request->get('desea1'))){
            $desea1 = $request->get('desea1').'|';
        }

         $desea2 = null;
        if(!empty($request->get('desea2'))){
            $desea2 = $request->get('desea2').'|';
        }

         $desea3 = null;
        if(!empty($request->get('desea3'))){
            $desea3 = $request->get('desea3').'|';
        }
         $registro->update(
            array(
                'nombres' => $request->get('nombres'),
                'apellidos' => $request->get('apellidos'),
                'correo' => $request->get('correo'),
                'titulo' => $request->get('titulo'),
                'cargo' => $request->get('cargo'),
                'empresa' =>$request->get('empresa'),
                'celular' => $request->get('celular'),
                'telefono' =>$request->get('telefono'),
                'direccion' => $request->get('direccion'),
                'genero' => $request->get('genero'),
                'ciudad' => $request->get('ciudad'),
                'rango_edad' => $request->get('rango_edad'),
                'entero' => $request->get('entero'),
                'cargos_estandarizados_id' =>$request->get('cargos_estandarizados_id'),
                'otro_genero' =>$request->get('otro_genero'),
                'otro_entero' =>$request->get('otro_entero'),
                'desea' =>$desea1.$desea2.$desea3,
            )
        );

        $user = User::where('registros_id', $registro->id)->first();
        if(empty($user)){
             $user = User::create([
                'name' => $registro->nombres.' '.$registro->apellidos,
                'email' => $registro->correo,
                'password' => Hash::make(date('Y')),
                'rol' => 'En vivo',
                'registros_id' => $registro->id,
                'estado' => 'Activo',
            ]);
            if($user->id){
                if(EmailController::emailUserAccount($user, 'Acceso a Ekos Eventos En Vivo', date('Y') )){
                    return redirect()->route('registro.index')->with('status','Actualizado exitosamente.'); 
                    
                }
            }
        }else{
            $user->email = $registro->correo;
            $user->password = Hash::make(date('Y'));
            $user->save();

            if($user->id){
                if(EmailController::emailUserAccount($user, 'Acceso a Ekos Eventos En Vivo', date('Y') )){
                    return redirect()->route('registro.index')->with('status','Actualizado exitosamente.'); 
                }
            }
        }
        


    }

    
   public function Descargar(){
        
       $model = Registro::get();
       if(Registro::count()>0){
            return Excel::download(new RegistroExport($model), 'reporte_registros_formulario_'.date('y-m-d_H_i_s').'.xlsx');
       }
    }
}
