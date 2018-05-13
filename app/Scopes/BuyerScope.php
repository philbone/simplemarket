<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

/**
 *  Permite utilizar la inyección implícita de dependencias en BuyerController.
 */
class BuyerScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->has('transactions');
    }
}
