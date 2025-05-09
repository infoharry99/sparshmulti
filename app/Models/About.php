<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;

class About extends Model
{
    protected $table ='about_us';
    protected $fillable=['title','tenant_id','summary'];

    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }
}
