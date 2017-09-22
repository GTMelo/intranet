<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vinculo extends Model
{

    protected $guarded = ['id'];

    protected $dates = ['data_dou', 'data_contrato'];

    public $timestamps = false;

    public function tipo(){
        return $this->belongsTo( TipoVinculo::class, 'tipo_vinculo_id' );
    }

    public function supervisor(){
        return $this->belongsTo(UserRh::class, 'supervisor_id');
    }
}
