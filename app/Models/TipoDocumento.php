<?php

namespace App\Models;

use App\Traits\Seedable;


class TipoDocumento extends Model
{

    protected $guarded = ['id'];

    public $timestamps = false;


    public function documentos(){
        return $this->hasMany(Documento::class);
    }

    public static function ofTipo($tipo){
        return static::where('descricao', $tipo)->first();
    }

}
