<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnvivoIngreso extends Model
{
    protected $table = 'envivo_ingreso';

    protected $fillable = [
        'fecha','registros_id','onlines_id'
    ];

    public function registro()
    {
        return $this->belongsTo('App\Registro', 'registros_id');
    }

     public function online()
    {
        return $this->belongsTo('App\Online', 'onlines_id');
    }
}
