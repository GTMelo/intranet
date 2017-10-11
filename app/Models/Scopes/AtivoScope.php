<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20/08/2017
 * Time: 13:49
 */

namespace App\Models\Scopes;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Scope;

class AtivoScope implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('deleted_at', null);
    }
}