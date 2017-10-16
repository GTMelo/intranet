<?php

namespace App\Models;



class Vinculo extends Model
{

    protected $guarded = ['id'];

    protected $dates = ['data_dou', 'data_contrato'];

    public $timestamps = false;

    public function tipo(){
        return $this->belongsTo( TipoVinculo::class, 'tipo_vinculo_id' );
    }

    public function user(){
        return $this->belongsTo(Rh::class, 'rh_id');
    }

    public function supervisor(){
        return $this->belongsTo(Rh::class, 'supervisor_id');
    }
}
