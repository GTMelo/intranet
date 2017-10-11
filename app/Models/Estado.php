<?php

namespace App\Models;



class Estado extends Model
{
    public function cidades(){
        return $this->hasMany(Cidade::class);
    }

    public function pais(){
        return $this->belongsTo(Pais::class);
    }
}
