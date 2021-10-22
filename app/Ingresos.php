<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    protected $table = 'ingresos';

    protected $fillable = [
        'fecha','registros_id'
    ];

    public function registro()
    {
        return $this->belongsTo('App\Registro', 'registros_id');
    }
}
