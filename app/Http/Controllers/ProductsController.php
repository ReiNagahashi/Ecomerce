<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('products',Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //validate data
                $this->validate($request,[
                    // ここはform内にあるname！！！
                    'name' => 'required|min:3|max:25',
                    'description' =>'required|min:5|max:50',
                    'price'=>'required',
                    'image'=>'required|image|mimes:png,jpeg,jpg',
                ]);
        
                //store data into database
        
                $product = new Product;
                //ここの最後のtitleはcreate内のフォーム内にあるnameと一致させる　ちなみに、1つ目のtitleはテーブルめいなので注意
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
        
                $product_image = $request->image;
                $product_image_new_name = time().$product_image->getClientOriginalName();
                $product_image->move('uploads/products',$product_image_new_name);
                $product->image = 'uploads/products/'.$product_image_new_name;
        
                $product->save();        
        
                Session::flash('success','Product Created Successfully');
        
                //redirect index page
                return redirect('/products');
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.create')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:25',
            'description'=>'required|min:5|max:50',
            'image'=>'nullable|mimes:png,jpeg,jpg',
            'price'=>'required',
        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;


        if($request->hasFile('image')){
            $product_image = $request->image;
            $product_image_new_name = time().$product_image->getClientOriginalName();
            $product_image->move('uploads/products',$product_image_new_name);
            $product->image = 'uploads/products/'.$product_image_new_name;
        }



        $product->save();

        Session::flash('success','Products edit Successfully');

        return redirect('/products');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Session::flash('success','Pdoducts deleted successfully');
        return redirect('/products');
    }
}
