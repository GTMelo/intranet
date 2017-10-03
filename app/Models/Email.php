<?php

namespace App\Models;

use App\Traits\Flaggable;
use App\Traits\Seedable;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

    use Flaggable, Seedable;

    protected $fillable = [
        'address'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
