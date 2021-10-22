<?php

namespace App\Http\Controllers;

use App\Objetivo;
use App\Evento;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $model = Objetivo::where('eventos_id',$evento->id)->get();
        return view('cms.objetivos.index',array('model'=>$model,'evento'=>$evento));
    }

    public function create($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $objetivo = new Objetivo();
        return view('cms.objetivos.create',array('objetivo'=>$objetivo,'evento'=>$evento));
    }

    
    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'descripcion' => 'required',
            'eventos_id' => 'required',
        ]);

      
        Objetivo::create(
            array(
                'descripcion' => $request->get('descripcion'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'autor' => $request->get('autor'),
                'url' => $request->get('url'),
                'texto_url' => $request->get('texto_url'),
                
            )
        );

        return redirect()->route('objetivo.index',$request->get('eventos_id'))->with('status','Nuevo OBJETIVO registrada exitosamente.');
    
    }

    
    public function edit(Objetivo $objetivo)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($objetivo->eventos_id);
        return view('cms.objetivos.edit',array('objetivo'=>$objetivo,'evento'=>$evento));
    }

    
    public function update(Request $request, Objetivo $objetivo)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'descripcion' => 'required',
            'eventos_id' => 'required',
        ]);

        

         $objetivo->update(
            array(
                'autor' => $request->get('autor'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'descripcion' => $request->get('descripcion'),
                'url' => $request->get('url'),
                'texto_url' => $request->get('texto_url'),
            )
        );


        return redirect()->route('objetivo.index',$request->get('eventos_id'))->with('status','Objetivo actualizado exitosamente.');

    }

    public function eliminar($id){
        ValidacionesController::soloADMIN();

        $model = Objetivo::findOrFail($id);
         $evento = $model->eventos_id;
        $model->delete();
         return redirect()->route('objetivo.index',$evento)->with('status','Objetivo eliminado exitosamente.');

    }
}
