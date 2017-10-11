<?php

namespace App\Models;

use App\Traits\Seedable;


class TipoVinculo extends Model
{


    public $timestamps = false;

    public function ofCodigo($code){
        return $this->where('codigo', $code)->first();
    }

}
