<?php

namespace App\Exports;

use App\Evento;
use App\Inscripcione;
use App\Formulario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EventosExport implements FromView
{
    private $eventos;
    private $evento;
    private $formulario;
     
     
    public function __construct($evento) {
        $this->evento = $evento;
    }


    public function view(): View
    {
        $eve = $this->evento;

        $formulario = Formulario::where('eventos_id',$eve->id)->orderby('id','DESC')->first();
        $model = Inscripcione::where('eventos_id',$eve->id)->get();
        return view('cms.reportes.evento', array('model' => $model,'formulario'=>$formulario,'eve'=>$eve));
    }
}
