<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 01/09/2017
 * Time: 14:45
 */

namespace App\Traits;

/**
 * Trait Jsonable
 * @package App\Traits
 *
 * This trait allows for a model to have json data saved on
 * a string format. If using this trait, the model must
 * have a $jsonable property, indicating which fields are
 * to be treated as json. It is best for the field to be
 * a text, so it wont break on a larger json entry.
 */
trait Jsonable
{

    public function getAttribute($key){
        $value = parent::getAttribute($key);

        if (in_array($key, $this->jsonable)) {
            $value = json_decode($value);
        }

        return $value;
    }

    public function setAttribute($key, $value){
        if (in_array($key, $this->jsonable)) {
            $value = json_encode($value);
        }

        return parent::setAttribute($key, $value);
    }

}