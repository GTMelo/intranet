<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 29/08/2017
 * Time: 13:07
 */

namespace App\Traits;


use Illuminate\Support\Facades\Crypt;

/**
 * Trait Encryptable
 *
 * Use this trait and define the $encrypted property in the model, which is
 * an array of fields which are going to be encrypted. Those fields will be
 * treated with the acessors and mutators in this trait to apply and
 * retrieve encrypted data.
 *
 * @package App\Traits
 */
trait Encryptable
{

    public function getAttribute($key){
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encrypted)) {
            $value = Crypt::decrypt($value);
        }

        return $value;
    }

    public function setAttribute($key, $value){
        if (in_array($key, $this->encrypted)) {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }

}