<?php

namespace App\Http\Controllers;

use App\Publicidad;
use App\Evento;
use Illuminate\Http\Request;

class PublicidadController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }

    public function index($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $model = Publicidad::where('eventos_id',$evento->id)->get();
        return view('cms.publicidad.index',array('model'=>$model,'evento'=>$evento));
    }



   
     public function create($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $publicidad = new Publicidad();
        return view('cms.publicidad.create',array('publicidad'=>$publicidad,'evento'=>$evento));
    }


    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'tipo' => 'required',
            'nombre' => 'required',
            'imagen' => 'required|mimes:png,jpg,jpeg,gif|max:4024',
            'eventos_id' => 'required',
        ]);

        $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
        $path = $request->imagen->move(public_path('upload/publicidad'), $imageName);

        Publicidad::create(
            array(
                'nombre' => $request->get('nombre'),
                'tipo' => $request->get('tipo'),
                'url' => $request->get('url'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'imagen' => $imageName,
                
            )
        );

        return redirect()->route('publicidad.index',$request->get('eventos_id'))->with('status','PUBLICIDAD registrada exitosamente.');
    }

    public function edit(Publicidad $publicidad)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($publicidad->eventos_id);

        return view('cms.publicidad.edit',array('publicidad'=>$publicidad,'evento'=>$evento));
    }

    

  
    public function update(Request $request, Publicidad $publicidad)
    {
         ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'nombre' => 'required',
            'eventos_id' => 'required',
        ]);

         if(!empty($request->imagen)){
            $request->validate([
                'imagen' => 'required|mimes:png,jpg,jpeg,gif|max:4024',
            ]);
            $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $path = $request->imagen->move(public_path('upload/publicidad'), $imageName);
        }else{
             $imageName = $publicidad->imagen;
        }

         $publicidad->update(
            array(
                'nombre' => $request->get('nombre'),
                'tipo' => $request->get('tipo'),
                'url' => $request->get('url'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'imagen' => $imageName,
                

            )
        );


        return redirect()->route('publicidad.index',$request->get('eventos_id'))->with('status','publicidad actualizado exitosamente.');
    }

    public function eliminar($id){
        ValidacionesController::soloADMIN();

        $model = Publicidad::findOrFail($id);
        $evento = $model->eventos_id;
        $model->delete();
         return redirect()->route('publicidad.index',$evento)->with('status','publicidad eliminado exitosamente.');

    }
}
