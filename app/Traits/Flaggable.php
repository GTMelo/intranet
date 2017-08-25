<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 25/08/2017
 * Time: 13:17
 */

namespace App\Traits;


use App\Models\Flag;

trait Flaggable
{

    public function flags(){
        return self::belongsToMany(Flag::class);
    }

}