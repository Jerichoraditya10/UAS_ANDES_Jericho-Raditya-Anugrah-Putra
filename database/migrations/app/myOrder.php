<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class myOrder extends Model
{
    protected $fillable=['userID','amount','paymentStatus'];

    public function product(){

        return $this->hasMany('App\Product');

    }

    public function user(){

        return $this->belongsTo('App\User');

    }
}
