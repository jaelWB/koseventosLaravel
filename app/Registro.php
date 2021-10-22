<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registro extends Model
{
    protected $table = 'registros';
    use SoftDeletes;

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


}
