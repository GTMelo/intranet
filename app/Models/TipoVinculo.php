<?php

namespace App\Models;

use App\Traits\Seedable;
use Illuminate\Database\Eloquent\Model;

class TipoVinculo extends Model
{
    use Seedable;

    public $timestamps = false;

    public function ofCodigo($code){
        return $this->where('codigo', $code)->first();
    }

}
