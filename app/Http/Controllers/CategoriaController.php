<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
   
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        ValidacionesController::soloADMIN();

        $model = Categoria::orderby('id','DESC')->get();
        return view('cms.categorias.index',array('model'=>$model));
    }
    public function create()
    {
        ValidacionesController::soloADMIN();

        $categoria = new Categoria();
        return view('cms.categorias.create',array('categoria'=>$categoria));
    }

   
    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate([
            'estado' => 'required',
            'descripcion' => 'required',

        ]);
        
        Categoria::create(
            array(
                'descripcion' => $request->get('descripcion'),
                'estado' => $request->get('estado'),
            )
        );

        return redirect()->route('categoria.index')->with('status','Nueva CATEGORÍA registrada exitosamente.');
    }


    public function edit(Categoria $categoria)
    {
        ValidacionesController::soloADMIN();
        return view('cms.categorias.edit',array('categoria'=>$categoria));
    }

   
    public function update(Request $request, Categoria $categoria)
    {
          ValidacionesController::soloADMIN();

         $request->validate([
            'estado' => 'required',
            'descripcion' => 'required',
        ]);
       
        $categoria->update(
            array(
                'descripcion' => $request->get('descripcion'),
                'estado' => $request->get('estado'),
            )
        );

        return redirect()->route('categoria.index')->with('status','CATEGORíA actualizada exitosamente.');
    }

    
}
