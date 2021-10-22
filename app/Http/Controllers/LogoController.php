<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Evento;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $model = Logo::where('eventos_id',$evento->id)->get();
        return view('cms.logo.index',array('model'=>$model,'evento'=>$evento));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $logo = new Logo();
        return view('cms.logo.create',array('logo'=>$logo,'evento'=>$evento));
    }

    
    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

         $request->validate([
            'estado' => 'required',
            'tipo' => 'required',
            'nombre' => 'required',
            'imagen' => 'required|mimes:png,jpg,jpeg|max:1024',
            'eventos_id' => 'required',
        ]);

        $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
        $path = $request->imagen->move(public_path('upload/logo'), $imageName);

        
        Logo::create(
            array(
                'nombre' => $request->get('nombre'),
                'tipo' => $request->get('tipo'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'imagen' => $imageName,
                'url' => $request->get('url'),
                'orden' => $request->orden,

                
            )
        );

        return redirect()->route('logo.index',$request->get('eventos_id'))->with('status','Nuevo LOGO registrada exitosamente.');
    }
    
    public function edit(Logo $logo)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($logo->eventos_id);
        return view('cms.logo.edit',array('logo'=>$logo,'evento'=>$evento));
    }

    
    public function update(Request $request, Logo $logo)
    {
        ValidacionesController::soloADMIN();

          $request->validate([
            'estado' => 'required',
            'nombre' => 'required',
            'tipo' => 'required',
            'eventos_id' => 'required',
        ]);

         if(!empty($request->imagen)){
            $request->validate([
                'imagen' => 'required|mimes:png,jpg,jpeg|max:1024',
            ]);
            $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $path = $request->imagen->move(public_path('upload/logo'), $imageName);
        }else{
             $imageName = $logo->imagen;
        }

         $logo->update(
            array(
                'nombre' => $request->get('nombre'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'imagen' => $imageName,
                'tipo' => $request->get('tipo'),
                'url' => $request->get('url'),
                'orden' => $request->orden,

            )
        );


        return redirect()->route('logo.index',$request->get('eventos_id'))->with('status','Logo actualizado exitosamente.');


    }

     public function eliminar($id){
        ValidacionesController::soloADMIN();

        $model = Logo::findOrFail($id);
         $evento = $model->eventos_id;
        $model->delete();
         return redirect()->route('logo.index',$evento)->with('status','Logo eliminado exitosamente.');

    }

}
