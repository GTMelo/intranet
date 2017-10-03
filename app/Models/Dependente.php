<?php

namespace App\Models;

use App\Traits\Seedable;
use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{

    use Seedable;

    protected $guarded = ['id'];

    protected $dates = ['data_nascimento'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tipo(){
        return $this->belongsTo(TipoDependente::class, 'tipo_dependente_id');
    }
}
