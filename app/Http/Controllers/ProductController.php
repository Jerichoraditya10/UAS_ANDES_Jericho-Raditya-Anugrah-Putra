<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Category;
use App\Product;

Use Session;

class ProductController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function create(){
        return view('insertProduct') ->with('categories',Category::all());
    }
    //Category::all() means "select * from category"
    public function store(){    
        $r=request(); 
        $image=$r->file('product-image');        
        $image->move('images',$image->getClientOriginalName());   
        //images is the location                
        $imageName=$image->getClientOriginalName(); 

        $addCategory=Product::create([    
            'id'=>$r->ID, 
            'name'=>$r->title,
            'description'=>$r->Description, 
            'price'=>$r->price,
            'image'=>$imageName,                 
            'quantity'=>$r->Quantity, 
            'categoryID'=>$r->category_id,             
        ]);
        Session::flash('success',"Product create succesful!");        
        Return redirect()->route('all.product');
    }

    public function show(){
        
        //$products=Product::all();
        $products=DB::table('products')
        ->leftjoin('categories', 'categories.id', '=', 'products.categoryID')
        ->select('categories.name as catname','categories.id as catid','products.*')
        //->get();
        ->paginate(3);       
        return view('showproduct')->with('products',$products);
    }

    
    public function delete($id){
       
        $products =Product::find($id);
        $products->delete();
        return redirect()->route('all.product');

    }

    public function edit($id){
       //select * from Products where id='$id'
        $products =Product::all()->where('id',$id);
        
        return view('editProduct')->with('products',$products)
                                ->with('categories',Category::all());
    }

    public function update(){
        $r=request();//retrive submited form data
        $products =Product::find($r->ID);  //get the record based on product ID      
        if($r->file('product-image')!=''){
            $image=$r->file('product-image');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $products->image=$imageName;
            }         
        $products->name=$r->title;
        $products->description=$r->Description;
        $products->price=$r->price;
        $products->quantity=$r->Quantity;
        $products->categoryID=$r->category_id;
        $products->save();
        return redirect()->route('all.product');
    }

    public function search(){
        $r=request();//retrive submited form data
        $keyword=$r->searchProduct;
        $products =DB::table('products')
        ->leftjoin('categories', 'categories.id', '=', 'products.categoryID')
        ->select('categories.name as catname','categories.id as catid','products.*')
        ->where('products.name', 'like', '%' . $keyword . '%')
        ->orWhere('products.description', 'like', '%' . $keyword . '%')
        //->get();
        ->paginate(3);        
        return view('showProduct')->with('products',$products);

    }




    
}
