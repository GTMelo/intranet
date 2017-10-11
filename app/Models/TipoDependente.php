<?php

namespace App\Models;

use App\Traits\Seedable;


class TipoDependente extends Model
{


    protected $guarded = ['id'];

    public $timestamps = false;

    public function dependentes(){
        return $this->hasMany(Dependente::class);
    }

    public static function ofTipo($tipo){
        return self::where('descricao', $tipo)->first();
    }

}
