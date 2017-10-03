<?php

namespace App\Models;

use App\Traits\Flaggable;
use App\Traits\Seedable;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{

    use Flaggable, Seedable;

    protected $fillable = ['numero'];

    public function users(){
        return self::belongsToMany(User::class);
    }
}
