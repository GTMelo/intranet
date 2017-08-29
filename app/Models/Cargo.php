<?php

namespace App\Models;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{

    protected $fillable = [
        'abreviacao', 'descricao'
    ];

}
