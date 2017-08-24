<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    protected $table = 'paises';

    protected $guarded = ['id'];

    public function cidades(){
        return self::hasMany(Cidade::class);
    }

    public function capitais(){

        return self::hasMany(Cidade::class)
            ->where('is_capital', true)
            ->get();

    }

}
