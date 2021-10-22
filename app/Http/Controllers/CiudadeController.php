<?php

namespace App\Http\Controllers;

use App\Ciudade;
use Illuminate\Http\Request;

class CiudadeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        ValidacionesController::soloADMIN();

        $model = Ciudade::orderby('id','DESC')->get();
        return view('cms.ciudade.index',array('model'=>$model));
    }

    
    public function create()
    {
        ValidacionesController::soloADMIN();

        $ciudade = new Ciudade();
        return view('cms.ciudade.create',array('ciudade'=>$ciudade));
    }

   
    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'nombre' => 'required',

        ]);
        //   $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
        // $path = $request->imagen->move(public_path('upload/ciudades'), $imageName);

      
        
        Ciudade::create(
            array(
                'nombre' => $request->get('nombre'),
                'estado' => $request->get('estado'),
                // 'imagen' => $imageName,

            )
        );

        return redirect()->route('ciudade.index')->with('status','Nuevo CIUDAD registrada exitosamente.');
    }

   
    public function edit(Ciudade $ciudade)
    {
        ValidacionesController::soloADMIN();

        return view('cms.ciudade.edit',array('ciudade'=>$ciudade));
    }

    
    public function update(Request $request, Ciudade $ciudade)
    {
        ValidacionesController::soloADMIN();

         $request->validate([
            'estado' => 'required',
            'nombre' => 'required',
        ]);

        //  if(!empty($request->imagen)){
        //     $request->validate([
        //         // 'imagen' => 'required|mimes:png,jpg,jpeg|max:1024',
        //     ]);
        //     $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
        //     $path = $request->imagen->move(public_path('upload/ciudades'), $imageName);
        // }else{
        //      $imageName = $ciudade->imagen;
        // }
        
       
        $ciudade->update(
            array(
                'nombre' => $request->get('nombre'),
                'estado' => $request->get('estado'),
                // 'imagen' => $imageName,

            )
        );

        return redirect()->route('ciudade.index')->with('status','Ciudad actualizada exitosamente.');
    }

    
    public function destroy(Ciudade $ciudade)
    {
        //
    }
}
