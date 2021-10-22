<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Ciudade;
use App\ciudadesEventos;
use App\Formulario;
use App\Categoria;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        ValidacionesController::soloADMIN();

        $model = Evento::where('estado','!=','ELIMINADO')->orderby('id','DESC')->get();
        return view('cms.evento.index',array('model'=>$model));
    }

    
    public function create()
    {
        ValidacionesController::soloADMIN();
        $categorias = Categoria::where('estado','Activo')->get();
        $evento = new Evento();
        return view('cms.evento.create',array('evento'=>$evento,'categorias'=>$categorias));
    }

    
    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();
        // dd($request->all());
        $request->validate([
            'estado' => 'required',
            'nombre' => 'required',
            'imagen' => 'required|mimes:png,jpg,jpeg|max:3024',
            'imagen_interna' => 'required|mimes:png,jpg,jpeg|max:3024',
            'modalidad' => 'required',
            'categorias_id' => 'required',

        ]);

        $imageName = rand(1,9999).time() . '.' . $request->file('imagen')->getClientOriginalExtension();
        $path = $request->imagen->move(public_path('upload/evento'), $imageName);

        $imagen_interna = rand(1,9999).time() . '.' . $request->file('imagen_interna')->getClientOriginalExtension();
        $path = $request->imagen_interna->move(public_path('upload/evento'), $imagen_interna);

        // IMAGENES NO REQUERIDAS
        $imagen_agenda = null;
        if($request->file('imagen_agenda')){
            $imagen_agenda = rand(1,9999).time() . '.' . $request->file('imagen_agenda')->getClientOriginalExtension();
            $request->imagen_agenda->move(public_path('upload/evento'), $imagen_agenda);
        }

        

        $logotipo_nombre = null;
        if($request->file('logotipo_nombre')){
            $logotipo_nombre = rand(1,9999).time() . '.' . $request->file('logotipo_nombre')->getClientOriginalExtension();
            $request->logotipo_nombre->move(public_path('upload/evento'), $logotipo_nombre);
        }

        $agenda_responsive = null;
        if($request->file('agenda_responsive')){
            $agenda_responsive = rand(1,9999).time() . '.' . $request->file('agenda_responsive')->getClientOriginalExtension();
            $request->agenda_responsive->move(public_path('upload/evento'), $agenda_responsive);
        }

        $banner_promocional = null;
        if($request->file('banner_promocional')){
            $banner_promocional = rand(1,9999).time() . '.' . $request->file('banner_promocional')->getClientOriginalExtension();
            $request->banner_promocional->move(public_path('upload/evento'), $banner_promocional);
        }
        
        $banner_secundario = null;
        if($request->file('banner_secundario')){
            $banner_secundario = rand(1,9999).time() . '.' . $request->file('banner_secundario')->getClientOriginalExtension();
            $request->banner_secundario->move(public_path('upload/evento'), $banner_secundario);
        }

        $imagen_modal = null;
        if($request->file('imagen_modal')){
            $imagen_modal = rand(1,9999).time() . '.' . $request->file('imagen_modal')->getClientOriginalExtension();
            $request->imagen_modal->move(public_path('upload/evento'), $imagen_modal);
        }
        
        $imagen_gracias = null;
        if($request->file('imagen_gracias')){
            $imagen_gracias = rand(1,9999).time() . '.' . $request->file('imagen_gracias')->getClientOriginalExtension();
            $request->imagen_gracias->move(public_path('upload/evento'), $imagen_gracias);
        }

         $mobil = null;
        if($request->file('mobil')){
            $mobil = rand(1,9999).time() . '.' . $request->file('mobil')->getClientOriginalExtension();
            $request->mobil->move(public_path('upload/evento'), $mobil);
        }
        // FIN DE IMAGENES NO REQUERIDAS
        
        $model = Evento::create(
            array(
                'nombre' => $request->get('nombre'),


                'agenda_responsive' => $agenda_responsive,
                'imagen_agenda' => $imagen_agenda,
                'imagen' => $imageName,
                'imagen_interna' => $imagen_interna,
                'banner_promocional' => $banner_promocional,
                'banner_secundario' => $banner_secundario,
                'imagen_gracias' => $imagen_gracias,
                'imagen_modal' => $imagen_modal,
                'mobil' => $mobil,

                'enlace_modal' => $request->get('enlace_modal'),
                'color' => $request->get('color'),
                'color_botones' => $request->get('color_botones'),
                'color_fuente' => $request->get('color_fuente'),
                'color_fuente_botones' => $request->get('color_fuente_botones'),
                'hora' => $request->get('hora'),
                'inscripcion' => $request->get('inscripcion'),
                'inicio' => $request->get('inicio'),
                'fin' => $request->get('fin'),
                // 'multiple_registro' => $request->get('multiple_registro'),
                'multiple_registro' => 0,
                'modalidad' => $request->get('modalidad'),
                'descripciontematica' => $request->get('descripciontematica'),
                'categorias_id' => $request->get('categorias_id'),
                'estado' => $request->get('estado'),

                'analytics' => $request->get('analytics'),
                'embed' => $request->get('embed'),
                'costo' => $request->get('costo'),
                'presentacion' => $request->get('presentacion'),
                'titulo_banner_promocional' => $request->get('titulo_banner_promocional'),
                'seccion_banner' => $request->get('seccion_banner'),
                'titulo_banner_secundario' => $request->get('titulo_banner_secundario'),
                'contenido_banner_secundario' => $request->get('contenido_banner_secundario'),
                'seccion_banner_secundario' => $request->get('seccion_banner_secundario'),
                'texto_registro' => $request->get('texto_registro'),
                'introduccion_expositores' => $request->get('introduccion_expositores'),
                'enlace_modal' => $request->get('enlace_modal'),
                'introduccion' => $request->get('introduccion'),
                'color_agenda' => $request->color_agenda,
                'color_expositores' => $request->color_expositores,
                'color_texto_expositores' => $request->color_texto_expositores,
                'color_texto_agenda' => $request->color_texto_agenda,


                'nombre_boton' => $request->nombre_boton,
                'enlace_boton' => $request->enlace_boton,
                'boton_banner_dos' => $request->boton_banner_dos,
                'enlace_banner_dos' => $request->enlace_banner_dos,
                'presentado_t' => $request->presentado_t,
                'auspiciado_t' => $request->auspiciado_t,
                'introduccion_t' => $request->introduccion_t,
                'objetivos_t' => $request->objetivos_t,
                'agenda_t' => $request->agenda_t,
                'grupos_t' => $request->grupos_t,
                'expositores_t' => $request->expositores_t,

                'boton_banner_uno' => $request->boton_banner_uno,
                'texto_boton_banner_uno' => $request->texto_boton_banner_uno,

                'logotipo_nombre' => $logotipo_nombre,
                'texto_banner_uno' => $request->texto_banner_uno,



            )
        );

        return redirect()->route('evento.index')->with('status','Nuevo EVENTO registrada exitosamente.');
    }

    
    public function edit(Evento $evento)
    {
        ValidacionesController::soloADMIN();
        $categorias = Categoria::where('estado','Activo')->get();

        return view('cms.evento.create',array('evento'=>$evento,'categorias'=>$categorias));

    }

   
    public function update(Request $request, Evento $evento)
    {
        ValidacionesController::soloADMIN();
        $imageName = $evento->imagen;
        $agenda_responsive = $evento->agenda_responsive;
        $imagen_agenda = $evento->imagen_agenda;
        $imagen_interna = $evento->imagen_interna;
        $banner_promocional = $evento->banner_promocional;
        $banner_secundario = $evento->banner_secundario;
        $imagen_gracias = $evento->imagen_gracias;
        $imagen_modal = $evento->imagen_modal;
        $logotipo_nombre = $evento->logotipo_nombre;
        $mobil = $evento->mobil;



        $request->validate([
             'estado' => 'required',
            'nombre' => 'required',
           
            'modalidad' => 'required',
            'categorias_id' => 'required',

        ]);

        if(!empty($request->imagen)){
            $request->validate([
                'imagen' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $path = $request->imagen->move(public_path('upload/evento'), $imageName);
        }

        if(!empty($request->agenda_responsive)){
            $request->validate([
                'agenda_responsive' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $agenda_responsive = rand(1,999449).time() . '.' . $request->file('agenda_responsive')->getClientOriginalExtension();
            $path = $request->agenda_responsive->move(public_path('upload/evento'), $agenda_responsive);
        }

        if(!empty($request->imagen_agenda)){
            $request->validate([
                'imagen_agenda' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $imagen_agenda = rand(1,999449).time() . '.' . $request->file('imagen_agenda')->getClientOriginalExtension();
            $path = $request->imagen_agenda->move(public_path('upload/evento'), $imagen_agenda);
        }

        if(!empty($request->imagen_interna)){
            $request->validate([
                'imagen_interna' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $imagen_interna = rand(1,999449).time() . '.' . $request->file('imagen_interna')->getClientOriginalExtension();
            $path = $request->imagen_interna->move(public_path('upload/evento'), $imagen_interna);
        }

        if(!empty($request->banner_promocional)){
            $request->validate([
                'banner_promocional' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $banner_promocional = rand(1,999449).time() . '.' . $request->file('banner_promocional')->getClientOriginalExtension();
            $path = $request->banner_promocional->move(public_path('upload/evento'), $banner_promocional);
        }

        if(!empty($request->banner_secundario)){
            $request->validate([
                'banner_secundario' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $banner_secundario = rand(1,999449).time() . '.' . $request->file('banner_secundario')->getClientOriginalExtension();
            $path = $request->banner_secundario->move(public_path('upload/evento'), $banner_secundario);
        }

        if(!empty($request->imagen_gracias)){
            $request->validate([
                'imagen_gracias' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $imagen_gracias = rand(1,999449).time() . '.' . $request->file('imagen_gracias')->getClientOriginalExtension();
            $path = $request->imagen_gracias->move(public_path('upload/evento'), $imagen_gracias);
        }

        if(!empty($request->imagen_modal)){
            $request->validate([
                'imagen_modal' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $imagen_modal = rand(1,999449).time() . '.' . $request->file('imagen_modal')->getClientOriginalExtension();
            $path = $request->imagen_modal->move(public_path('upload/evento'), $imagen_modal);
        }

        if($request->file('logotipo_nombre')){
             $request->validate([
                'logotipo_nombre' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $logotipo_nombre = rand(1,9999).time() . '.' . $request->file('logotipo_nombre')->getClientOriginalExtension();
            $request->logotipo_nombre->move(public_path('upload/evento'), $logotipo_nombre);
        }

        if($request->file('mobil')){
             $request->validate([
                'mobil' => 'required|mimes:png,jpg,jpeg|max:3024',
            ]);
            $mobil = rand(1,9999).time() . '.' . $request->file('mobil')->getClientOriginalExtension();
            $request->mobil->move(public_path('upload/evento'), $mobil);
        }

        

        $evento->update(
            
                 array(
                'nombre' => $request->get('nombre'),


                'agenda_responsive' => ($request->quitarAgendaR==1)?null:$agenda_responsive,
                'imagen_agenda' => ($request->quitarAgenda==1)?null:$imagen_agenda,
                'imagen' => $imageName,
                'imagen_interna' => $imagen_interna,
                'banner_promocional' => $banner_promocional,
                'banner_secundario' => $banner_secundario,
                'imagen_gracias' => $imagen_gracias,
                'imagen_modal' => $imagen_modal,
                'mobil' => $mobil,

                'enlace_modal' => $request->get('enlace_modal'),
                'color_fuente_botones' => $request->get('color_fuente_botones'),
                'color' => $request->get('color'),
                'color_fuente' => $request->get('color_fuente'),
                'color_botones' => $request->get('color_botones'),
                'hora' => $request->get('hora'),
                'inscripcion' => $request->get('inscripcion'),
                'inicio' => $request->get('inicio'),
                'fin' => $request->get('fin'),
                // 'multiple_registro' => $request->get('multiple_registro'),
                'multiple_registro' => 0,

                'modalidad' => $request->get('modalidad'),
                'descripciontematica' => $request->get('descripciontematica'),
                'categorias_id' => $request->get('categorias_id'),
                'estado' => $request->get('estado'),

                'analytics' => $request->get('analytics'),
                'embed' => $request->embed,
                'costo' => $request->get('costo'),
                'presentacion' => $request->get('presentacion'),
                'titulo_banner_promocional' => $request->get('titulo_banner_promocional'),
                'seccion_banner' => $request->get('seccion_banner'),
                'titulo_banner_secundario' => $request->get('titulo_banner_secundario'),
                'contenido_banner_secundario' => $request->get('contenido_banner_secundario'),

                'seccion_banner_secundario' => $request->get('seccion_banner_secundario'),
                'texto_registro' => $request->get('texto_registro'),
                'introduccion_expositores' => $request->get('introduccion_expositores'),
                'enlace_modal' => $request->get('enlace_modal'),
                'introduccion' => $request->get('introduccion'),
                'color_agenda' => $request->color_agenda,
                'color_expositores' => $request->color_expositores,
                'color_texto_expositores' => $request->color_texto_expositores,
                'color_texto_agenda' => $request->color_texto_agenda,

                'nombre_boton' => $request->nombre_boton,
                'enlace_boton' => $request->enlace_boton,
                'boton_banner_dos' => $request->boton_banner_dos,
                'enlace_banner_dos' => $request->enlace_banner_dos,
                'presentado_t' => $request->presentado_t,
                'auspiciado_t' => $request->auspiciado_t,
                'introduccion_t' => $request->introduccion_t,
                'objetivos_t' => $request->objetivos_t,
                'agenda_t' => $request->agenda_t,
                'grupos_t' => $request->grupos_t,
                'expositores_t' => $request->expositores_t,
                
                'boton_banner_uno' => $request->boton_banner_uno,
                'texto_boton_banner_uno' => $request->texto_boton_banner_uno,

                'logotipo_nombre' => ($request->quitarLogo==1)?null:$logotipo_nombre,
                

                'texto_banner_uno' => $request->texto_banner_uno,



            )

            
        );


        return redirect()->route('evento.index')->with('status','Evento actualizado exitosamente.');

    }

   
    public function ciudades($evento)
    {
        ValidacionesController::soloADMIN();


        $ciudades = Ciudade::where('estado','Activo')->orderby('nombre', 'ASC')->get();
        $misciudades = ciudadesEventos::where('eventos_id',$evento)->get();
        $evento = Evento::findorFail($evento);


        return view('cms.evento.ciudades',array('ciudades'=>$ciudades,'misciudades'=>$misciudades,'evento'=>$evento));


    }


     public function ciudadesSave(Request $request){
        ValidacionesController::soloADMIN();

        $registros = ciudadesEventos::where('ciudades_id',$request->ciudades_id)->where('eventos_id',$request->eventos_id);
        if($registros->count() >0){
            $registros->delete();
        }

        $eventoG = Evento::findOrFail($request->eventos_id);
        $ciudadG = Ciudade::findOrFail($request->ciudades_id);

        $even = preg_replace('/[^A-Za-z0-9]/', "-", strtolower($eventoG->nombre));
        $city = preg_replace('/[^A-Za-z0-9]/', "-", strtolower($ciudadG->nombre));
        $slug = $even.'-'.$city;

        $registros = ciudadesEventos::where('ciudades_id','!=',$request->ciudades_id)->where('eventos_id','!=',$request->eventos_id)->where('slug',$slug);
        if($registros->count() >0){
            $slug = $slug.($registros->count()+1);
        }

        $model = ciudadesEventos::create(
            array(
                'ciudades_id'=>$request->ciudades_id,
                'eventos_id'=>$request->eventos_id,
                'fecha'=>$request->fecha,
                'fecha_fin'=>$request->fecha_fin,
                'hora'=>$request->hora,
                'timer'=>$request->timer,
                'slug' =>$slug,
                'fecha_descriptiva'=>$request->fecha_descriptiva,
                'orden'=>$request->orden,

            )
        );

        if($model->id > 0){
            return redirect()->route('evento.ciudades',$request->eventos_id)->with('status','Ciudad registrada exitosamente');
        }


    }
    public function ciudadeseliminar($id){
        ValidacionesController::soloADMIN();
        $model = ciudadesEventos::findOrFail($id);
        $id = $model->eventos_id;
        $model->delete();
        return redirect()->route('evento.ciudades',$id)->with('status','Ciudad eliminada exitosamente');

    }

    public function formulario($evento)
    {
        ValidacionesController::soloADMIN();

        $miform = Formulario::where('eventos_id',$evento)->first();
        $evento = Evento::findorFail($evento);
        if(empty($miform)){
            $miform = new Formulario();
        }
        return view('cms.evento.formulario',array('miform'=>$miform,'evento'=>$evento));
    }

    public function eliminar($evento)
    {
        ValidacionesController::soloADMIN();


        $model = Evento::findorFail($evento);
       if(!empty($model)){
            $model->update(array('estado'=>'ELIMINADO'));
            return redirect()->route('evento.index')->with('status','EVENTO eliminado exitosamente.');

       }
    }

    // GUARDAR LOS CAMPOS PARA EL EVENTO
    public function salvarcampos(Request $request){
        ValidacionesController::soloADMIN();

        $request->validate([
            'eventos_id' => 'required',
        ]);

        $idE = $request->get('eventos_id');
        $miform = Formulario::where('eventos_id',$idE);
        if(!empty($miform->first())){
            $miform->delete();
        }
        Formulario::create(
            array(
                'pais' => $request->get('pais'),
                'cedula' => $request->get('cedula'),
                'empresa' => $request->get('empresa'),
                'celular' => $request->get('celular'),
                'cargo' => $request->get('cargo'),
                'email' => $request->get('email'),
                'direccion' => $request->get('direccion'),
                'ciudad' => $request->get('ciudad'),
                'titulo' => $request->get('titulo'),
                'universidad' => $request->get('universidad'),
                'nacimiento' => $request->get('nacimiento'),
                'eventos_id' => $request->get('eventos_id'),

                'asistencia' => $request->asistencia,
                'telefono' => $request->telefono,
                'genero' => $request->genero,
                'edad' => $request->edad,
                'educacion' => $request->educacion,
                'entero' => $request->entero,
                'whatsapp' => $request->whatsapp,

            )
        );
        return redirect()->route('evento.formulario',array('evento'=>$idE))->with('status','Datos guardados exitosamente.');

        
    }
}
