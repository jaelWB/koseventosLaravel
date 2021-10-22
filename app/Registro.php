<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';

     protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'titulo',
        'cargo',
        'empresa',
        'celular',
        'telefono',
        'direccion',
        'genero',
        'otro_genero',
        'ciudad',
        'rango_edad',
        'entero',
        'otro_entero',
        'cargos_estandarizados_id',
        'desea',
        'asistir',
        'educacion',

    ];

      public function cargos()
    {
        return $this->belongsTo('App\CargosEstandarizado', 'cargos_estandarizados_id');
    }

   
}
