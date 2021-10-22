<?php

namespace App\Http\Controllers;

use App\Online;
use App\Evento;
use App\EnvivoIngreso;
use Illuminate\Http\Request;
use App\Exports\OnlineExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Storage;
use File;

class OnlineController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $model = Online::where('eventos_id',$evento->id)->first();
        if($model == null){
            return redirect()->route('online.create',$evento->id);
        }else{
            return redirect()->route('online.edit',$model->id);

        }
    }

    

    public function create($evento)
    {
        ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($evento);
        $online = new Online();
        return view('cms.online.create',array('online'=>$online,'evento'=>$evento));
    }

   
    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'video' => 'required',
            'hora' => 'required',
            'fecha' => 'required',
            'eventos_id' => 'required',
        ]);

        // $imageName = null;
        //  if(!empty($request->modal)){
        //     $request->validate([
        //         'modal' => 'required|mimes:png,jpg,jpeg,gif|max:1024',
        //     ]);
        //     $imageName = time() . '.' . $request->file('modal')->getClientOriginalExtension();
        //     $path = $request->modal->move(public_path('upload/online'), $imageName);
        // }

//        $even = preg_replace('/[^A-Za-z0-9]/', "-", strtolower($request->get('titulo')));
//        $slugValidar = Online::where('slug',$even)->count();
//        if($slugValidar >0){
//            $slug = $even.$slugValidar+1;
//        }else{
//            $slug = $even;
//        }


        $online = Online::create(
            array(
                'titulo' => $request->get('titulo'),
                'descripcion' => $request->get('descripcion'),
                'video' => $request->get('video'),
                'hora' => $request->get('hora'),
                'fecha' => $request->get('fecha'),
                'enlace' => $request->get('enlace'),
                'url_modal' => $request->get('url_modal'),
                'nombre_enlace' => $request->get('nombre_enlace'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'modal' => $request->get('modal'),
                'slug' => $slug,
                'chat' => $request->get('chat'),

                
            )
        );

       $this->xml($online);


        return redirect()->route('online.index',$request->get('eventos_id'))->with('status','Almacenado exitosamente.');


    }

    

    
    public function edit(Online $online)
    {
         ValidacionesController::soloADMIN();

        $evento =Evento::findorFail($online->eventos_id);

        return view('cms.online.edit',array('online'=>$online,'evento'=>$evento));
    }

    
    public function update(Request $request, Online $online)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'video' => 'required',
            'hora' => 'required',
            'fecha' => 'required',
            'eventos_id' => 'required',
        ]);

        

//        $even = preg_replace('/[^A-Za-z0-9]/', "-", strtolower($request->get('titulo')));
//        $slugValidar = Online::where('slug',$even)->where('id','!=',$online->id)->count();
//        if($slugValidar >0){
//            $slug = $even.$slugValidar+1;
//        }else{
//            $slug = $even;
//        }

         $online->update(
           array(
                'titulo' => $request->get('titulo'),
                'descripcion' => $request->get('descripcion'),
                'video' => $request->get('video'),
                'hora' => $request->get('hora'),
                'fecha' => $request->get('fecha'),
                'enlace' => $request->get('enlace'),
                'url_modal' => $request->get('url_modal'),
                'nombre_enlace' => $request->get('nombre_enlace'),
                'estado' => $request->get('estado'),
                'eventos_id' => $request->get('eventos_id'),
                'slug' => $slug,
                'chat' => $request->get('chat'),
                'modal' => $request->get('modal'),

                
            )
        );

       $this->xml($online);

        return redirect()->route('online.index',$request->get('eventos_id'))->with('status','Actualizado exitosamente.');


    }

   
    function xml($online)
    {
        $model = Online::where('fecha','>=',date('Y-m-d'))->where('estado','Activo')->orderby('fecha','ASC');
        if($model->count()>0){
            $model = $model->get();
            $json = [];
            foreach($model as $item){
               array_push($json,[
                   'id' => $item->id,
                   'nombre' => $item->nombre_enlace,
                   'link' => $item->enlace,
                   'modal' => $item->modal,
               ]);
            }

        }
       
        $file = 'link.txt';
        $destinationPath=public_path()."/xml/";
        
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0655,true);  }
        if(File::put($destinationPath.$file,json_encode($json))){
            return true;
        }
    }

    public function verIngresos($id){
        $evento = Online::where('eventos_id',$id)->first();
        if(empty($evento )){
            return redirect()->route('evento.index')->with('status','No existe registros para este evento');

        }
       $model = EnvivoIngreso::where('onlines_id',$evento->id);
       if($model->count()>0){
            $model = $model->get();
            return Excel::download(new OnlineExport($model,$evento->titulo), 'reporte_eventos_quiene_visitaron'.$evento->nombre.'-'.date('y-m-d').'.xlsx');
       }
    }
}
