<?php

namespace App\Models;

use App\Traits\Encryptable;
use App\Traits\Seedable;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{

    use Seedable;

    protected $fillable = [
        'abreviacao', 'descricao'
    ];

    public function users(){
        return $this->hasMany(Rh::class);
    }

}
