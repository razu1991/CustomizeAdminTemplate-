<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name','category_id','title','details','code','barcode','price','discount','featured','quantity','status'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

}
