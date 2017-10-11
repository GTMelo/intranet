<?php

namespace App\Models;

use App\Traits\Seedable;


class TipoEscolaridade extends Model
{



    protected $guarded = ['id'];

    public $timestamps = false;

    public function escolaridades(){
        return $this->hasMany(Escolaridade::class);
    }

}
