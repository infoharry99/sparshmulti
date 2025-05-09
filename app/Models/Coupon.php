<?php

namespace App\Models;
use App\Scopes\TenantScope;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable=['code','tenant_id','type','value','status'];

    
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }
    public static function findByCode($code){
        return self::where('code',$code)->first();
    }
    public function discount($total){
        if($this->type=="fixed"){
            return $this->value;
        }
        elseif($this->type=="percent"){
            return ($this->value /100)*$total;
        }
        else{
            return 0;
        }
    }
}
