<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    protected $table = 'paises';

    public function cidades(){
        return self::hasMany(Cidade::class);
    }

}
