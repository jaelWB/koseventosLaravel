<?php

namespace App\Http\Controllers;
use App\Evento;
use App\Online;
use App\Publicidad;
use App\Registro;
use App\CargosEstandarizado;
use App\User;
use App\Ingresos;
use App\EnvivoIngreso;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function eventos(){
        $res = array();

        $model = Online::where('fecha','>=',date('Y-m-d'))->where('estado','Activo')->orderby('fecha','ASC');
        if($model->count() >0){
            $data = array();
            $model = $model->get();
            foreach($model as $item){
                array_push($data,[
                    'id' => $item->id,
                    'titulo' => $item->titulo,
                    'descripcion' => $item->descripcion,
                    'fecha' => $item->fecha.'T'.$item->hora,
                    'slug' => $item->slug,
                ]);
            }

            $res = array(
                'status' => true,
                'data' => $data, 
                'count' => count($model)
            );

        }else{
            $res = array(
                'status' => false,
                'data' => [], 
                'count' => 0, 
            );
        }
        

        return response()->json($res,200);
    }

    public function cargos(){
        $res = array();

        $model = CargosEstandarizado::where('estado','Activo')->orderby('id','ASC');
        if($model->count() >0){
            $data = array();
            $model = $model->get();
            foreach($model as $item){
                array_push($data,[
                    'id' => $item->id,
                    'descripcion' => $item->descripcion,
                ]);
            }

            $res = array(
                'status' => true,
                'data' => $data, 
                'count' => count($model)
            );

        }else{
            $res = array(
                'status' => false,
                'data' => [], 
                'count' => 0, 
            );
        }
        

        return response()->json($res,200);
    }



    public function verEventos($slug){
        $res = array();

        $model = Online::where('slug',$slug)->where('estado','Activo')->first();

        if($model){
            $publicidad = Publicidad::where('eventos_id',$model->eventos_id)->where('estado','Activo');
            $ads = array();

            if($publicidad->count()){
                $publicidad = $publicidad->get();

                foreach ($publicidad as $key) {
                    array_push($ads,array(
                        'tipo' => $key->tipo,
                        'imagen' => "https://ekoseventos.com/upload/publicidad/".$key->imagen,
                        'nombre' => $key->nombre,
                        'url' => $key->url,
                        'id' => $key->id,
                        'nombre' => $key->nombre,
                    ));
                }
            }

            $data = array(
                'id' => $model->id,
                'titulo' => $model->titulo,
                'descripcion' => $model->descripcion,
                'video' => $model->video,
                'enlace' => $model->enlace,
                'nombre_enlace' => $model->nombre_enlace,
                'modal' => $model->modal,
                // 'url_modal' => $model->url_modal,
                'fecha' => $model->fecha.' '.$model->hora,
                'slug' => $model->slug,
                'chat' => (!empty($model->chat))?$model->chat:'',
                'ads' => $ads,
            );
           

            $res = array(
                'status' => true,
                'data' => $data, 
            );

        }else{
            $res = array(
                'status' => false,
                'data' => [], 
            );
        }
        

        return response()->json($res,200);
    }

    public function login(Request $request){
        $recaptcha_response = $request->token;
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
        $recaptcha = file_get_contents($recaptcha_url . '?secret=6Lf_vuYcAAAAADssMLMDHkezxMZcpsYNPKyKOQLg&response=' . $recaptcha_response); 
        $recaptcha = json_decode($recaptcha); 

        if($recaptcha->success == true){
            if($recaptcha->score >= 0.7){

            } else {
                $res = array(
                    'status' => false,
                    'keyId' => '', 
                    'appSecret' => '', 
                    'error' => '2', 
                );
                return response()->json($res,200);
                die();
            }
        }else {
            $res = array(
                'status' => false,
                'keyId' => '', 
                'appSecret' => '', 
                'error' => '2', 

            );
                return response()->json($res,200);
            die();

        }

        $email = trim($request->email);
        $password = trim($request->password);
         $res = array(
                'status' => false,
                'keyId' => '', 
                'appSecret' => '', 
                    'error' => '1', 

            );

        if(empty($email) || empty($password)){
             $res = array(
                'status' => false,
                'keyId' => '', 
                'appSecret' => '',  
                    'error' => '1', 
                
            );
            return response()->json($res,200);

            die();
        }

        $model = User::where('email',$email)->first();
        if(empty($model->id)){
            $registro = Registro::where('correo',$email)->first();
            if(!empty($registro)){
                if($password == date('Y')){
                    $user = User::create([
                        'name' => $registro->nombres.' '.$registro->apellidos,
                        'email' => $registro->correo,
                        'password' => Hash::make(date('Y')),
                        'rol' => 'En vivo',
                        'registros_id' => $registro->id,
                        'estado' => 'Activo',
                    ]);
                    if($user->id){
                        $token = md5(rand(0,666)).'-'.md5($user->id).'-'.md5(rand(0,9999999)).'-'.md5($user->email);
                        $user->token = $token;
                        $user->update();

                        Ingresos::create(array(
                            'fecha' => date('Y-m-d H:i:s'),
                            'registros_id' => $registro->id,
                        ));

                        if(EmailController::emailUserAccount($user, 'Acceso a Ekos Eventos En Vivo', date('Y') )){
                            $res = array(
                                'status' => true,
                                'keyId' => $token,
                                'appSecret' => md5(rand(0,9999999999999)).'-'.md5($user->id).'-'.md5(rand(0,9999999)).'-'.md5($user->email).'-'.md5($user->id), 
                            );
                        }
                    }
                }else{
                    $res = array(
                        'status' => false,
                        'keyId' => '', 
                        'appSecret' => '', 
                    'error' => '1', 

                    );
                }
                
            }else{
                 $res = array(
                    'status' => false,
                    'keyId' => '', 
                    'appSecret' => '', 
                    'error' => '4', 

                );
            }
            
            // die();
        }else{
            if (Hash::check($password, $model->password)) { 
                if(!empty($model->registros_id)){
                    Ingresos::create(array(
                        'fecha' => date('Y-m-d H:i:s'),
                        'registros_id' => $model->registros_id,
                    ));
                }


                $token = md5(rand(0,666)).'-'.md5($model->id).'-'.md5(rand(0,9999999)).'-'.md5($model->email);
                $model->token = $token;
                if($model->update()){
                    $res = array(
                        'status' => true,
                        'keyId' => $token, 
                        'appSecret' => md5(rand(0,9999999999999)).'-'.md5($model->id).'-'.md5(rand(0,9999999)).'-'.md5($model->email).'-'.md5($model->id), 
                        'error' => '0', 

                    );
                }
            
                // $this->validate(array(
                //     'password' => ['required', 'string', 'min:8', 'confirmed'],
                // ));

                // $model->fill(
                //     [
                //         'password' => Hash::make($this->password)
                //     ]
                // )->save();
                
                // if(EmailController::emailUserAccount($model, 'Account Updated | Scorpion', $this->password )){
                //     $this->default();
                //     session()->flash('message', 'User successfully saved.');

                // }

            }
        }
        return response()->json($res,200);

    }

    public function registro(Request $request){

        $recaptcha_response = $request->token;
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
        $recaptcha = file_get_contents($recaptcha_url . '?secret=6Lf_vuYcAAAAADssMLMDHkezxMZcpsYNPKyKOQLg&response=' . $recaptcha_response); 
        $recaptcha = json_decode($recaptcha); 

        if($recaptcha->success == true){
            if($recaptcha->score >= 0.7){

            } else {
                $res = array(
                    'status' => false,
                    'error' => '1', 
                    'sms' => 'No se pudo validar el código de recaptcha, actualiza la página e intenta de nuevo.', 

                );
                return response()->json($res,200);
                die();
            }
        }else {
            $res = array(
                'status' => false,
                'error' => '1', 
                'sms' => 'No se pudo validar el código de recaptcha, actualiza la página e intenta de nuevo.', 

            );
            return response()->json($res,200);
            die();

        }



        $valida = Registro::where('correo',$request->get('correo'))->count();
        if($valida >0){
            $res = array(
                'status' => false,
                'error' => '1', 
                'sms' => 'Los datos ingresados en el formulario ya han sido registrados, por favor revisa la información e intenta nuevamente.', 

            );
        }else{
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
             $desea4 = null;
            if(!empty($request->get('desea4'))){
                $desea4 = $request->get('desea4').'|';
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
                    'desea' =>$desea1.$desea2.$desea3.$desea4,
                    'asistir' =>$request->get('asistir'),
                    'educacion' =>$request->get('educacion'),

                    
                )
            );
            if($model->id > 0){
                $user = User::create([
                    'name' => $model->nombres.' '.$model->apellidos,
                    'email' => $model->correo,
                    'password' => Hash::make($request->get('password')),
                    'rol' => 'En vivo',
                    'registros_id' => $model->id,
                    'estado' => 'Activo',
                ]);
                if($user->id){
                    try {
                        EmailController::emailUserAccount($user, 'Acceso a Ekos Eventos En Vivo', $request->get('password') );
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                    $res = array(
                        'status' => true,
                        'error' => '0', 
                        'sms' => '', 
                    );
                }
            }
        }

        return response()->json($res,200);
        
    }


    public function registroVista(Request $request){
        $slug = $request->slug;
        $token = $request->token;
        if(!empty($token)){
            $user =  User::where('token',$token)->first();
            if(!empty($user->registros_id)){
                $online = Online::where('slug',$slug)->first();
                EnvivoIngreso::create(array(
                    'fecha' => date('Y-m-d H:i:s'),
                    'registros_id' => $user->registros_id,
                    'onlines_id' =>$online->id
                ));
            }
        }
    }

    public function registroAds(Request $request){
        $ads = Publicidad::findOrFail($request->id);
         $res = array(
                'status' => false,
            );
            
        if(!empty($ads)){
            $cont = $ads->clicks;
            $ads->clicks = $cont+1;
            $ads->update();

            $res = array(
                'status' => true,
            );
        }
        return response()->json($res,200);

    }


    public function boton(){
         $file = 'link.txt';
        $destinationPath=public_path()."/xml/".$file;
        $content = json_decode(file_get_contents($destinationPath));
         return response()->json($content,200);

    }


}
