<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;


class Settings extends Model
{
    protected $fillable=['short_des','primary_color','tenant_id','secondary_color','text_color','background_color','description','photo','address','phone','email','logo'];
   
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }
}
