<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['data_nascimento'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tipo(){
        return $this->belongsTo(TipoDependente::class, 'tipo_dependente_id');
    }
}
