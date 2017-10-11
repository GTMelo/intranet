<?php

namespace App\Models;

use App\Traits\Seedable;
use Laratrust\LaratrustPermission;

class Permission extends LaratrustPermission
{

    use Seedable;

    protected $fillable = ['name', 'display_name', 'description'];


}
