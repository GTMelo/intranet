<?php

namespace App\Models;



class Escolaridade extends Model
{

    protected $guarded = ['id'];

    protected $dates = ['inicio', 'termino'];

    public function tipo(){
        return $this->belongsTo(TipoEscolaridade::class, 'tipo_escolaridade_id');
    }

    public function user(){
        return $this->belongsTo(Rh::class, 'user_id');
    }

}