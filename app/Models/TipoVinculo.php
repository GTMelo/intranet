<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVinculo extends Model
{
    public $timestamps = false;

    public function ofCodigo($code){
        return $this->where('codigo', $code)->first();
    }

}
