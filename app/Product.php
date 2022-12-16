<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','description','price','image','quantity','categoryID'];

    public function category(){

        return $this->belongsTo('App\Category');

    }

    public function myCart(){

        return $this->hasMany('App\myCart'); // location becareful spelling

    }

}
