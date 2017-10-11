<?php

namespace App\Models;



class Documento extends Model
{

    protected $guarded = ['id'];

    public function tipo(){
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function rh(){
        return $this->belongsTo(Rh::class, 'rh_id');
    }
}
