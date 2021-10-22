<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'nombre',
        'color',
        'imagen',
        'color_botones',
        'hora',
        'imagen_interna',
        'introduccion',
        'banner_promocional',
        'titulo_banner_promocional',
        'seccion_banner',
        'seccion_banner',
        'imagen_agenda',
        'agenda_responsive',
        'costo',
        'inscripcion',
        'inicio',
        'fin',
        'estado',
        'texto_registro',
        'multiple_registro',
        'presentacion',
        'embed',
        'analytics',
        'categorias_id',
        'modalidad',
        'banner_secundario',
        'titulo_banner_secundario',
        'contenido_banner_secundario',
        'introduccion_expositores',
        'imagen_modal',
        'seccion_banner_secundario',
        'enlace_modal',
        'imagen_gracias',
        'color_fuente',
        'color_fuente_botones',
        'color_agenda',
        'color_expositores',
        'color_texto_expositores',
        'color_texto_agenda',


        'nombre_boton',
        'enlace_boton',
        'boton_banner_dos',
        'enlace_banner_dos',
        
        'presentado_t',
        'auspiciado_t',
        'introduccion_t',
        'objetivos_t',
        'agenda_t',
        'grupos_t',
        'expositores_t',

        'boton_banner_uno',
        'texto_boton_banner_uno',
        'logotipo_nombre',

        'texto_banner_uno',
        'mobil',

    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'categorias_id');
    }
}
