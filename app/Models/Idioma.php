<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{

    protected $guarded = ['id'];

    public function users(){
        return $this->belongsToMany(UserRh::class, 'idioma_user_rh', 'idioma_id', 'user_rh_id')
            ->withPivot(['leitura','escrita','compreensao','conversacao',]);
    }

}
