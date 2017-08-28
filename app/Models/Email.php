<?php

namespace App\Models;

use App\Traits\Flaggable;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

    use Flaggable;

    protected $fillable = [
        'address'
    ];

}
