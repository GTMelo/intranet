<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEscolaridade extends Model
{

    protected $guarded = ['id'];

    public function escolaridades(){
        return $this->hasMany(Escolaridade::class);
    }

}
