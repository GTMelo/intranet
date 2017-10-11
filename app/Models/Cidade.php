<?php

namespace App\Models;

use App\Traits\Flaggable;
use App\Traits\Seedable;


class Cidade extends Model
{
    use Flaggable;

    protected $guarded = ['id'];

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function enderecos(){
        return $this->hasMany(Endereco::class);
    }

}
