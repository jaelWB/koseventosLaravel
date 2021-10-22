<?php

namespace App\Exports;

use App\Evento;
use App\Inscripcione;
use App\Formulario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OnlineExport implements FromView
{
    private $eventos;
    private $nombre;
  
     
    public function __construct($eventos, $nombre) {
        $this->eventos = $eventos;
        $this->nombre = $nombre;
    }


    public function view(): View
    {
        $eventos = $this->eventos;
        $nombre = $this->nombre;
        return view('cms.reportes.eventoOnline', array('model' => $eventos, 'nombre' => $nombre));
    }
}
