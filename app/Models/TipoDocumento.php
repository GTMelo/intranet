<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{

    protected $guarded = ['id'];


    public function documentos(){
        return $this->hasMany(Documento::class);
    }

}
