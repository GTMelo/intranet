<?php

namespace App\Models;

use App\Traits\Seedable;


class Endereco extends Model
{



    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(Rh::class);
    }

    public function cidade(){
        return $this->belongsTo(Cidade::class);
    }

    public function string(){
        return $this->logradouro
            . ' - ' . $this->cep
            . ', ' . $this->cidade->nome
            . ' - ' . $this->cidade->estado->pais->nome;

    }

}
