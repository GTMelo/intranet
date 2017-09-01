<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{

    protected $guarded = ['id'];

    public function tipo(){
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function user(){
        return $this->belongsTo(UserRh::class, 'user_rh_id');
    }
}
