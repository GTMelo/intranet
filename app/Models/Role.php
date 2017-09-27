<?php

namespace App\Models;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{

    public static function ofName($name){

        return self::where('name', $name)->first();
    }



}
