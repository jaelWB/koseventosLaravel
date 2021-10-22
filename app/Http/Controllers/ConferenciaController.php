<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Conferencia;
use Illuminate\Http\Request;
use Validator;

class ConferenciaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $model = Conferencia::where('eventos_id',$evento->id)->get();
        return view('cms.conferencia.index',array('model'=>$model,'evento'=>$evento));
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
        $conferencia = new Conferencia();
        return view('cms.conferencia.create',array('conferencia'=>$conferencia,'evento'=>$evento));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $path = $request->imagen->move(public_path('upload/conferencia'), $imageName);

        
        Conferencia::create(
            array(
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'url' => $request->url,
                'imagen' => $imageName,
                
            )
        );

        return redirect()->route('conferencia.index',$request->get('eventos_id'))->with('status','Nuevo CONFERENCICIA registrada exitosamente.');
    
    }

    
    public function edit(Conferencia $conferencia)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($conferencia->eventos_id);
        return view('cms.conferencia.edit',array('conferencia'=>$conferencia,'evento'=>$evento));
    }

   
    public function update(Request $request, Conferencia $conferencia)
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
            $path = $request->imagen->move(public_path('upload/conferencia'), $imageName);
        }else{
             $imageName = $conferencia->imagen;
        }

         $conferencia->update(
            array(
                'nombre' => $request->get('nombre'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'imagen' => $imageName,
                'descripcion' => $request->get('descripcion'),
                'url' => $request->url,


            )
        );


        return redirect()->route('conferencia.index',$request->get('eventos_id'))->with('status','Conferencia actualizado exitosamente.');

    }


    public function eliminar($id){
        ValidacionesController::soloADMIN();

        $model = Conferencia::findOrFail($id);
        $evento = $model->eventos_id;
        $model->delete();
         return redirect()->route('conferencia.index',$evento)->with('status','Grupo eliminado exitosamente.');

    }
}
