<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function ofCode($code){
        return static::where('code', $code)->first();
    }

}
