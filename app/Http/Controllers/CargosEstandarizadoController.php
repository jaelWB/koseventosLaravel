<?php

namespace App\Http\Controllers;

use App\CargosEstandarizado;
use Illuminate\Http\Request;

class CargosEstandarizadoController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
      //  dd('ss');
       ValidacionesController::soloADMIN();

        $model = CargosEstandarizado::orderby('id','ASC')->get();
        return view('cms.cargosestandarizados.index',array('model'=>$model));
    }
    public function create()
    {
        ValidacionesController::soloADMIN();

        $cargosestandarizado = new CargosEstandarizado();
        return view('cms.cargosestandarizados.create',array('cargosestandarizado'=>$cargosestandarizado));
    }

    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'descripcion' => 'required',

        ]);
        
        CargosEstandarizado::create(
            array(
                'descripcion' => $request->get('descripcion'),
                'estado' => $request->get('estado'),
            )
        );

        return redirect()->route('cargosestandarizado.index')->with('status','Nuevo cargo registrado exitosamente.');
    }


    public function edit(CargosEstandarizado $cargosestandarizado)
    {
        ValidacionesController::soloADMIN();
        return view('cms.cargosestandarizados.edit',array('cargosestandarizado'=>$cargosestandarizado));
    }

   
    public function update(Request $request, CargosEstandarizado $cargosestandarizado)
    {
          ValidacionesController::soloADMIN();

         $request->validate([
            'estado' => 'required',
            'descripcion' => 'required',
        ]);
       
        $cargosestandarizado->update(
            array(
                'descripcion' => $request->get('descripcion'),
                'estado' => $request->get('estado'),
            )
        );

        return redirect()->route('cargosestandarizado.index')->with('status','cargos estandarizado actualizada exitosamente.');
    }

    
}
