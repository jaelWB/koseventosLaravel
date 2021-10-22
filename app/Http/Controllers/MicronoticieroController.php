<?php

namespace App\Http\Controllers;

use App\Micronoticiero;
use Illuminate\Http\Request;

class MicronoticieroController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
      //  dd('ss');
       ValidacionesController::soloADMIN();

        $model = Micronoticiero::orderby('id','DESC')->get();
        return view('cms.micronoticieros.index',array('model'=>$model));
    }
    public function create()
    {
        ValidacionesController::soloADMIN();

        $micronoticiero = new Micronoticiero();
        return view('cms.micronoticieros.create',array('micronoticiero'=>$micronoticiero));
    }

    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'descripcion' => 'required',

        ]);
        
        Micronoticiero::create(
            array(
                'descripcion' => $request->get('descripcion'),
                'estado' => $request->get('estado'),
            )
        );

        return redirect()->route('micronoticiero.index')->with('status','Nueva micronoticiero registrada exitosamente.');
    }


    public function edit(Micronoticiero $micronoticiero)
    {
        ValidacionesController::soloADMIN();
        return view('cms.micronoticieros.edit',array('micronoticiero'=>$micronoticiero));
    }

   
    public function update(Request $request, Micronoticiero $micronoticiero)
    {
          ValidacionesController::soloADMIN();

         $request->validate([
            'estado' => 'required',
            'descripcion' => 'required',
        ]);
       
        $micronoticiero->update(
            array(
                'descripcion' => $request->get('descripcion'),
                'estado' => $request->get('estado'),
            )
        );

        return redirect()->route('micronoticiero.index')->with('status','micronoticiero actualizada exitosamente.');
    }

    
}
