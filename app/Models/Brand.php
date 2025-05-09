<?php

namespace App\Models;
use App\Models\Product;
use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=['title','slug','tenant_id','status'];

    // public static function getProductByBrand($id){
    //     return Product::where('brand_id',$id)->paginate(10);
    // }
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }
    public function products(){
        return $this->hasMany('App\Models\Product','brand_id','id')->where('status','active');
    }
    public static function getProductByBrand($slug){
        // dd($slug);
        return Brand::with('products')->where('slug',$slug)->first();
        // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    }
}
