<?php

namespace App\Models;

use App\Traits\Seedable;


class Dependente extends Model
{

    protected $guarded = ['id'];

    protected $dates = ['data_nascimento'];

    public function user(){
        return $this->belongsTo(Rh::class, 'rh_id');
    }

    public function tipo(){
        return $this->belongsTo(TipoDependente::class, 'tipo_dependente_id');
    }
}
