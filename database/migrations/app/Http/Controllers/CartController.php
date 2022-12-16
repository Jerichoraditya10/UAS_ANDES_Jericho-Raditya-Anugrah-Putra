<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Product;
use App\User;
use App\myCart;
use Auth;

Use Session;

class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function add(){ 

        $r=request(); 
        $addCategory=myCart::create([    
            
            'quantity'=>$r->quantity,             
            'orderID'=>'',
            'productID'=>$r->id,                 
            'userID'=>Auth::id(), 
                        
        ]);
        Session::flash('success',"Product add succesful!");        
        Return redirect()->route('my.cart');
    }

    public function show(){
        
       
        $carts=DB::table('my_carts')
        ->leftjoin('products', 'products.id', '=', 'my_carts.productID')
        ->select('my_carts.quantity as qty', 'my_carts.id as cid','products.*')
        ->where('my_carts.orderID','=','') //'' haven't make payment
        ->where('my_carts.userID','=',Auth::id())
        ->get();
        //->paginate(3);       
        return view('showcart')->with('carts',$carts);
    }

    public function delete($id){
       
        $carts =myCart::find($id);
        $carts->delete();
        return redirect()->route('my.cart');

    }

}
