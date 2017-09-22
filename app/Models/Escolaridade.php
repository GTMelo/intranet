<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model
{

    protected $guarded = ['id'];

    protected $dates = ['inicio', 'termino'];

    public function tipo(){
        return $this->belongsTo(TipoEscolaridade::class, 'tipo_escolaridade_id');
    }

    public function user(){
        return $this->belongsTo(UserRh::class, 'user_id');
    }

}