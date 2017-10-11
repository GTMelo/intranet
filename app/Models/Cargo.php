<?php

namespace App\Models;



class Cargo extends Model
{

    protected $fillable = [
        'abreviacao', 'descricao'
    ];

    public function users(){
        return $this->hasMany(Rh::class);
    }

}
