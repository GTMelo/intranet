<?php

namespace App\Models;

use App\Traits\Seedable;
use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{

    use Seedable;

    public static function ofName($name){

        return self::where('name', $name)->first();
    }



}
