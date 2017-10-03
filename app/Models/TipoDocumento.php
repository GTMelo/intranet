<?php

namespace App\Models;

use App\Traits\Seedable;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{

    use Seedable;

    protected $guarded = ['id'];


    public function documentos(){
        return $this->hasMany(Documento::class);
    }

    public static function ofTipo($tipo){
        return static::where('descricao', $tipo);
    }

}
