<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TenantScope implements Scope
{
    public static $tenantId;

    public static function setTenant($tenantId)
    {
        static::$tenantId = $tenantId;
    }

    public function apply(Builder $builder, Model $model)
    {
        if (app()->has('currentTenant') && app('currentTenant')) {
            $builder->where('tenant_id', app('currentTenant')->id);
        }
    }
}
