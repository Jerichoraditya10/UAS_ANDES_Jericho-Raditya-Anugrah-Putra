<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Category;
use App\Product;

Use Session;

class productShow extends Controller
{
    //
    public function showProducts(){
        
        //$products=Product::all();
        $products=DB::table('products')
        ->leftjoin('categories', 'categories.id', '=', 'products.categoryID')
        ->select('categories.name as catname','categories.id as catid','products.*')
        //->get();
        ->paginate(3);       
        return view('products')->with('products',$products);
    }

    public function showProductDetail($id){
        //select * from Products where id='$id'
         $products =Product::all()->where('id',$id);
         
         return view('productdetail')->with('products',$products)
                                 ->with('categories',Category::all());
     }

}
