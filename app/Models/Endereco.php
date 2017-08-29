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

}
