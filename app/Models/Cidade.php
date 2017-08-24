<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{

    protected $guarded = ['id'];

    public function pais(){
        return self::belongsTo(Pais::class);
    }

}
