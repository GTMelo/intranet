<?php

namespace App\Models;

use App\Traits\Flaggable;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{

//    use Flaggable;

    protected $fillable = ['numero'];

    public function users(){
        return self::belongsToMany(UserRh::class);
    }
}
