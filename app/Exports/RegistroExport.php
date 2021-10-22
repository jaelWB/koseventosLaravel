<?php

namespace App\Exports;

use App\Evento;
use App\Inscripcione;
use App\Formulario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class RegistroExport implements FromView
{
    private $eventos;
  
     
    public function __construct($eventos) {
        $this->eventos = $eventos;
    }


    public function view(): View
    {
        $eventos = $this->eventos;
        return view('cms.reportes.registro', array('model' => $eventos));
    }
}
