<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['title','slug','description','category','banner','photo','mobile_banner','status'];
}
