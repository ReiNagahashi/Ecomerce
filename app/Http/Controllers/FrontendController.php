<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontendController extends Controller
{
    public function index(){
        //各ページから3つの商品を取り出すことを意味している
        return view('index',['products'=>Product::paginate(3)]);
    }

    public function singleProduct($id){
        $product=Product::find($id);
        return view('single')->with('product',$product);
    }

}
