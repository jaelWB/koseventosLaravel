<?php

namespace App\Http\Controllers;

use App\Expositore;
use App\Evento;
use Illuminate\Http\Request;

class ExpositoreController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $model = Expositore::where('eventos_id',$evento->id)->get();
        return view('cms.expositore.index',array('model'=>$model,'evento'=>$evento));
    }

   
    public function create($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $expositore = new Expositore();
        return view('cms.expositore.create',array('expositore'=>$expositore,'evento'=>$evento));
    }

    
    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'nombre' => 'required',
            'imagen' => 'required|mimes:png,jpg,jpeg|max:1024',
            'eventos_id' => 'required',
        ]);

        $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
        $path = $request->imagen->move(public_path('upload/expositores'), $imageName);

        
        Expositore::create(
            array(
                'nombre' => $request->get('nombre'),
                'resumen' => $request->get('resumen'),
                'linkedin' => $request->get('linkedin'),
                'facebook' => $request->get('facebook'),
                'instagram' => $request->get('instagram'),
                'twitter' => $request->get('twitter'),
                'url' => $request->get('url'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'imagen' => $imageName,
                'tipo' => $request->get('tipo'),

                
            )
        );

        return redirect()->route('expositore.index',$request->get('eventos_id'))->with('status','Nuevo CONFERENCICIA registrada exitosamente.');
    
    }

    
    public function edit(Expositore $expositore)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($expositore->eventos_id);
        return view('cms.expositore.edit',array('expositore'=>$expositore,'evento'=>$evento));
    }

   
    public function update(Request $request, Expositore $expositore)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'nombre' => 'required',
            'eventos_id' => 'required',
        ]);

         if(!empty($request->imagen)){
            $request->validate([
                'imagen' => 'required|mimes:png,jpg,jpeg|max:1024',
            ]);
            $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $path = $request->imagen->move(public_path('upload/expositores'), $imageName);
        }else{
             $imageName = $expositore->imagen;
        }

         $expositore->update(
            array(
                 'nombre' => $request->get('nombre'),
                'resumen' => $request->get('resumen'),
                'linkedin' => $request->get('linkedin'),
                'facebook' => $request->get('facebook'),
                'instagram' => $request->get('instagram'),
                'url' => $request->get('url'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'imagen' => $imageName,
                'twitter' => $request->get('twitter'),
                'tipo' => $request->get('tipo'),


            )
        );


        return redirect()->route('expositore.index',$request->get('eventos_id'))->with('status','Expositor actualizado exitosamente.');

    }


    public function eliminar($id){
        ValidacionesController::soloADMIN();

        $model = Expositore::findOrFail($id);
        $evento = $model->eventos_id;
        $model->delete();
         return redirect()->route('expositore.index',$evento)->with('status','Expositor eliminado exitosamente.');

    }

   
}
