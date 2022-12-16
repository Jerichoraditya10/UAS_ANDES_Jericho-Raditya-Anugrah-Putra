<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class myCart extends Model
{
    //
    protected $fillable=['orderID','userID','quantity','productID'];

    
    public function product(){

        return $this->belongsTo('App\Product');

    }

    public function user(){

        return $this->belongsTo('App\User');

    }
}
