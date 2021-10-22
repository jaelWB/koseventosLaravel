<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Ciudade;
use App\ciudadesEventos;
use App\Formulario;
use App\Expositore;
use App\Conferencia;
use App\Inscripcione;
use App\Objetivo;
use App\Logo;
use Illuminate\Http\Request;
use App\Exports\EventosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','evento','tematica','registro','eliminar','registrar','finalizar','buscar','RepetidoLead');
    }

    public function cms($evento = null){

        
        $user = Auth::user();
       $value = session(['rol'=> $user->rol]);

        $eventosA = Evento::where('estado','Activo')->count();
        $eventosI = Evento::where('estado','Inactivo')->count();
        $incripciones =  Inscripcione::where('estado','REGISTRADO')->get();

        if(!empty($evento)){
            $ultimoEvento = Evento::where('estado','Activo')->where('id',$evento)->orderby('id','DESC')->first();
            $datosUltimo = Inscripcione::where('eventos_id',$ultimoEvento->id)->orderby('id','DESC')->paginate(30);
            $formulario = Formulario::where('eventos_id',$ultimoEvento->id)->orderby('id','DESC')->first();
            $datosUltimoC = Inscripcione::where('eventos_id',$ultimoEvento->id)->orderby('id','DESC')->count();


        }else{
            $ultimoEvento = Evento::where('estado','Activo')->orderby('id','DESC')->first();
            $datosUltimo = Inscripcione::where('eventos_id',$ultimoEvento->id)->orderby('id','DESC')->paginate(30);
            $datosUltimoC = Inscripcione::where('eventos_id',$ultimoEvento->id)->orderby('id','DESC')->count();
            $formulario = Formulario::where('eventos_id',$ultimoEvento->id)->orderby('id','DESC')->first();
        }
       
        $todosEventos = Evento::where('estado','Activo')->orderby('id','DESC')->get();

        return view('cms.home.cms',array(
            'eventosA'=>$eventosA,
            'eventosI'=>$eventosI,
            'incripciones'=>count($incripciones),
            'ultimoEvento'=>$ultimoEvento,
            'model'=>$datosUltimo,
            'todosEventos'=>$todosEventos,
            'formulario'=>$formulario,
            'datosUltimoC'=>$datosUltimoC,
        ));
    }

    public function buscar(Request $request){
        $parametro = $request->get('parametro');
        $eventostipo = array();
        $preeventos =  Evento::where('nombre','like',"%$parametro%")->where('estado','Activo')->get();
        if(!empty($preeventos)){
            foreach($preeventos as $pr){
                array_push($eventostipo,$pr->id);
            }
            $eventos = ciudadesEventos::where('fecha','>=',date('Y-m-d'))
            ->whereIn('eventos_id',$eventostipo)->get();
             $ciudades = Ciudade::where('estado','Activo')->get();
            // dd($eventos->count());
            return view('home',array(
                'ciudades'=>$ciudades,
                'eventos'=>$eventos,
                'ubicacion'=>'todos',
                'modalidad'=>'todos',
                'tipo'=>'gratis'
            ));
        }
    }

    public function index($ubicacion = 'todos',$tipo = 'todos',$modalidad = 'todos',$mes = 'todos')
    {
        $eventostipo = array();
            date_default_timezone_set('America/Bogota');
        $mount = null;
        if($mes!='todos'){
            $mount=$mes;
        }
        if($tipo == 'todos'){
            if($modalidad!='todos'){
                $preeventos = Evento::where('estado','Activo')->whereIn('modalidad',[$modalidad,'VP'])->select('id')->get();
            }else{
                $preeventos = Evento::where('estado','Activo')->select('id')->get();
            }

             if($ubicacion != 'todos'){
                $eventos = ciudadesEventos::where('fecha','>=',date('Y-m-d'))
                ->whereIn('eventos_id',$preeventos)
                ->where('ciudades_id',$ubicacion)
                ->when($mount, function ($query,$mount) {
                    $query->whereBetween('fecha', [date('Y').'-'.$mount.'-01', date('Y').'-'.$mount.'-31']);
                })
                ->orderby('orden','ASC')
                ->get();
             }else{
                $eventos = ciudadesEventos::where('fecha','>=',date('Y-m-d'))
                ->whereIn('eventos_id',$preeventos)
                ->when($mount, function ($query,$mount) {
                    $query->whereBetween('fecha', [date('Y').'-'.$mount.'-01', date('Y').'-'.$mount.'-31']);
                })
                ->orderby('orden','ASC')
                ->get();
             }
             

        }else{
            if($tipo != 'gratis'){
                if($modalidad!='todos'){
                    $preeventos = Evento::where('costo','>',0)->select('id')->where('modalidad',$modalidad)->where('estado','Activo')->get();
                }else{
                    $preeventos = Evento::where('costo','>',0)->select('id')->where('estado','Activo')->get();
                }
            }else{
                if($modalidad!='todos'){
                    $preeventos = Evento::whereNull('costo')->select('id')->where('modalidad',$modalidad)->where('estado','Activo')->get();
                }else{
                    $preeventos = Evento::whereNull('costo')->select('id')->where('estado','Activo')->get();
                }
            }
         

            if($ubicacion != 'todos'){
                $eventos = ciudadesEventos::where('fecha','>=',date('Y-m-d'))
                ->whereIn('eventos_id',$preeventos)
                ->where('ciudades_id',$ubicacion)
                ->when($mount, function ($query,$mount) {
                    $query->whereBetween('fecha', [date('Y').'-'.$mount.'-01', date('Y').'-'.$mount.'-31']);
                })
                ->orderby('orden','ASC')
                ->get();
            }else{
                $eventos = ciudadesEventos::where('fecha','>=',date('Y-m-d'))
                ->whereIn('eventos_id',$preeventos)
                ->when($mount, function ($query,$mount) {
                    $query->whereBetween('fecha', [date('Y').'-'.$mount.'-01', date('Y').'-'.$mount.'-31']);
                })
                ->orderby('orden','ASC')
                ->get();
            }
        }


        

        
        $ciudades = Ciudade::where('estado','Activo')->get();
        //   dd($eventos->count());


          // QUERY GENERAL PARA LLAMAR A LOS VEHICULOS
        // $eventos = Evento::where('estado','Activo')
        //  ->where('fecha','>=',date('Y-m-d'))
        //  ->when($costo, function ($query, $costo) {
        //             return $query->where('costo','>', $costo);
        //         })
        // ->orderby('fecha','ASC')->get();

        $mobile = 0;
        $mobile = ValidacionesController::isMobile();


        return view('home',array(
            'ciudades'=>$ciudades,
            'eventos'=>$eventos,
            'ubicacion'=>$ubicacion,
            'modalidad'=>$modalidad,
            'tipo'=>$tipo,
            'mes'=>$mes,
            'mobile'=>$mobile,
        ));
    }

    public function evento($nombre){
        
        $ciEv = ciudadesEventos::where('slug',$nombre)->first();
        if(empty($ciEv)){
            echo 'Evento no encontrado con la URL detallada.';
            die();
        }

        $evento = Evento::findOrFail($ciEv->eventos_id);
        
        
        //OBENTER LO LOSGOS NIVEL 1
        $logos = Logo::where('eventos_id',$evento->id)->where('estado','Activo')->orderby('orden','ASC')->get();


        $logosP = Logo::where('eventos_id',$evento->id)->where('estado','Activo')->where('tipo','principal')->orderby('orden','ASC')->count();




        $objetivos = Objetivo::where('eventos_id',$evento->id)->where('estado','Activo')->get();
        
        $ciudad = ciudadesEventos::findOrFail($ciEv->id); 

        $expositore = Expositore::where('eventos_id',$evento->id)->where('estado','Activo')->get();


        $conferencias = Conferencia::where('eventos_id',$evento->id)->where('estado','Activo')->get();



        // FORMULARIO 
        $miForm = Formulario::where('eventos_id',$evento->id)->first();
        //traer los asociados al token
        $asociados = null;
        
        if(empty($tk)){
            $tk = date('Y_m_d_h_i_s').rand(0,666);
        }else{
            $asociados = Inscripcione::where('eventos_id',$evento->id)->where('tk',$tk)->where('estado','REGISTRADO')->get();
        }
        
        $ubicaciones = ciudadesEventos::where('fecha','>=',date('Y-m-d'))->where('eventos_id',$evento->id)->get();


        return view('app.evento',
            array(
                'evento'=>$evento,
                'logosP'=>$logosP,
                'logos'=>$logos,
                'ciudad'=>$ciudad,
                'objetivos'=>$objetivos,
                'conferencias'=>$conferencias,
                'expositore'=>$expositore,

                 'miForm'=>$miForm,
                'tk'=>$tk,
                'ubicaciones'=>$ubicaciones,
                'asociados'=>$asociados,

               
                
            ));
    }

    public function tematica($evento){
        $evento = Evento::whereRaw('md5(id)="'.$evento.'"')->first();
        if(empty($evento))
            return abort(404);
        
        $expositores = Expositore::where('eventos_id',$evento->id)->where('estado','Activo')->get();
        $ciudades = ciudadesEventos::where('eventos_id',$evento->id)->get();
        $logosSuperior = Logo::where('eventos_id',$evento->id)->where('estado','Activo')->where('tipo','superior')->get();
        $logosInferior = Logo::where('eventos_id',$evento->id)->where('estado','Activo')->where('tipo','inferior')->get();


        return view('app.tematica', array(
                'evento'=>$evento,
                'expositores'=>$expositores,
                'ciudades'=>$ciudades,
                'logosSuperior'=>$logosSuperior,
                'logosInferior'=>$logosInferior,

            ));
    }
    public function registro($evento, $tk = null){
        $evento = Evento::whereRaw('md5(id)="'.$evento.'"')->first();
        if(empty($evento))
            return abort(404);

        $miForm = Formulario::where('eventos_id',$evento->id)->first();

        //traer los asociados al token
        $asociados = null;
        
        if(empty($tk)){
            $tk = date('Y_m_d_h_i_s').rand(0,666);
        }else{
            $asociados = Inscripcione::where('eventos_id',$evento->id)->where('tk',$tk)->where('estado','REGISTRADO')->get();
        }
        
        $ubicaciones = ciudadesEventos::where('fecha','>=',date('Y-m-d'))->where('eventos_id',$evento->id)->get();

        return view('app.registro', array(
                'evento'=>$evento,
                'miForm'=>$miForm,
                'tk'=>$tk,
                'ubicaciones'=>$ubicaciones,
                'asociados'=>$asociados,

            ));
    }

    public function registrar(Request $request){

        $evento = Evento::where('id',$request->get('eventos_id'))->first();
        // dd(implode(',',$request->whatsapp));
        if(empty($evento))
            return abort(404);

        $coiunta =  Inscripcione::where('eventos_id',$evento->id)->where('email',$request->get('email'))->where('ubicacion',$request->get('ubicacion'));
        
        if( $coiunta->count() >0){
            $registro = ciudadesEventos::where('ciudades_id',$request->ubicacion)->where('eventos_id',$request->eventos_id)->first();
            // dd($registro->slug);
            return redirect()->route('home.RepetidoLead',array('slug'=>$registro->slug));
        }

        $entero=null;
        $genero=null;
        if(!empty($request->entero)){
            $entero = ($request->entero=='Otros'?'Otros: '.$request->txtentero: $request->entero);

        }

        if(!empty($request->genero)){
            $genero = ($request->genero=='Otro'?'Otro: '.$request->txtgenero: $request->genero);
        }


        $model = Inscripcione::create(array(
            'nombre'=>$request->get('nombre'),
            'apellidos'=>$request->get('apellidos'),
            'ubicacion'=>$request->get('ubicacion'),
            'pais'=>$request->get('pais'),
            'cedula'=>$request->get('cedula'),
            'empresa'=>$request->get('empresa'),
            'celular'=>$request->get('celular'),
            'cargo'=>$request->get('cargo'),
            'email'=>$request->get('email'),
            'direccion'=>$request->get('direccion'),
            'ciudad'=>$request->get('ciudad'),
            'universidad'=>$request->get('universidad'),
            'titulo'=>$request->get('titulo'),
            'eventos_id'=>$request->get('eventos_id'),
            'nacimiento'=>$request->get('anio').'-'.$request->get('mes').'-'.$request->get('dia'),
            'tk'=>$request->get('tk'),
            'estado'=>'REGISTRADO',

            'asistencia' => $request->asistencia,
            'telefono' => $request->telefono,
            'edad' => $request->edad,
            'educacion' => $request->educacion,
            'genero' => $genero,
            'entero' => $entero,

           

            'whatsapp' => !empty($request->whatsapp)?implode(',',$request->whatsapp):null,


            // ''=>$request->get(''),
        ));
        if($evento->multipleregistro ==1){
            return redirect()->route('home.registro',array('evento'=>md5($evento->id),'tk'=>$request->get('tk')))->with('status','Registro realizado exitosamente.');

        }else{
            return redirect()->route('home.finalizar',array('evento'=>md5($request->get('eventos_id')),'lead'=>$model->id))->with('status','Expositor actualizado exitosamente.');
        }

    }

    public function eliminar($lead){
        $lead = Inscripcione::findOrFail($lead);
        if(!empty($lead)){
            $lead->update(array(
                'estado'=>'ELIMINADO',
            ));
            return redirect()->route('home.registro',array('evento'=>md5($lead->eventos_id),'tk'=>$lead->tk))->with('status','Registro eliminado exitosamente.');

        }else{
            return abort(404);
        }
    }

    public function finalizar($evento,$lead = null){
        $evento = Evento::whereRaw('md5(id)="'.$evento.'"')->first();
        $leads = null;

        if(!empty($evento)){

            if(!empty($lead)){
                $leads = Inscripcione::findOrFail($lead);
            }

            return view('app.finalizar',
            array(
                'evento'=>$evento,
                'leads'=>$leads,
            ));
        }else{
            return abort(404);
        }
    }

    public function RepetidoLead($slug){
        //  dd($slug.'sss');
        $evenC = ciudadesEventos::where('slug',$slug)->first();
        if(empty($evenC)){
            echo 'No existe este evento.';
            die();
        }
        $evento = Evento::findOrFail($evenC->eventos_id);
        $leads = null;

        if(!empty($evento)){

            return view('app.errorRegistro',
            array(
                'slug'=>$slug,
                'evento'=>$evento,
                
            ));
        }else{
            return abort(404);
        }
    }

    public function reportes(){
        $todosEventos = Evento::where('estado','Activo')->orderby('id','DESC')->get();
        return view('cms.reportes.home',array(
            'todosEventos'=>$todosEventos,
        ));
    }

    public function asistencias(){
        $todosEventos = Evento::where('estado','Activo')->orderby('id','DESC')->get();
        return view('cms.asistencia.home',array(
            'todosEventos'=>$todosEventos,
        ));
    }

    public function asistenciaevento($evento){

        $evento = Evento::findOrFail($evento);
        $formulario = Formulario::where('eventos_id',$evento->id)->orderby('id','DESC')->first();

        $model = Inscripcione::where('estado','REGISTRADO')->where('eventos_id',$evento->id)->orderby('id','DESC')->get();
        return view('cms.asistencia.detalle',array(
            'evento'=>$evento,
            'model'=>$model,
            'formulario'=>$formulario,
        ));
    }


    public function reportesexportar($evento){
        $eve = Evento::findorFail($evento);
       
        return Excel::download(new EventosExport($eve), 'reporte_eventos_'.$eve->nombre.'-'.date('y-m-d').'.xlsx');
    }

    public function salvarlead($lead,$opcion){
      $lead = Inscripcione::findOrFail($lead);
      if(!empty($lead)){
        if($opcion =='SI'){
             $lead->update(array(
                'asistio' => 'SI a las: '.date('Y-m-d H:i:s')
            ));
        }else{
            $lead->update(array(
                'asistio' => null
            ));
        }
        return 1;
      }else{
          echo 0;
      }
    }

}
