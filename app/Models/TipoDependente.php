<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDependente extends Model
{

    protected $guarded = ['id'];

    public function dependentes(){
        return $this->hasMany(Dependente::class);
    }

}
