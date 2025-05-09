<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable=['user_id','tenant_id','product_id','cart_id','price','amount','quantity'];
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
