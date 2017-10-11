<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 10/10/2017
 * Time: 12:12
 */

namespace App\Models;

use App\Traits\Seedable;

abstract class Model extends \Illuminate\Database\Eloquent\Model
{

    use Seedable;


}