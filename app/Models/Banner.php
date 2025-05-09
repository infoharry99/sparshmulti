<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;

class Banner extends Model
{
    protected $fillable=['title','slug','tenant_id','description','banner','photo','status'];
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }
}
