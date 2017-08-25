<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['slug', 'display_name', 'description'];

    public static function ofSlug($slug){
        return self::where('slug', $slug)->first();
    }
}
