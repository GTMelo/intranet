<?php

namespace App\Models;

use App\Traits\Flaggable;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use Flaggable;

    protected $guarded = ['id'];

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

}
