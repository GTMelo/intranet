<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRH extends Model
{
    protected $table = 'users_rh';

    public function user(){
        return self::belongsTo(User::class);
    }
}
