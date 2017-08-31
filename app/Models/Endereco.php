<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    protected $guarded = ['id'];

    public function users(){
        return $this->hasMany(UserRh::class);
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
