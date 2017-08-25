<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRh extends Model
{
    protected $table = 'users_rh';

    protected $primaryKey = 'user_id';

    public function user(){
        return self::belongsTo(User::class);
    }

    public function telefones()
    {
        return self::belongsToMany(Telefone::class);
    }

    public function emails()
    {
        return self::belongsToMany(Email::class);
    }
}
