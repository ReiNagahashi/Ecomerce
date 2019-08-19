<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//laravel package
use Illuminate\Support\Facades\Session;
//laravel package
use Cart;
//NOT laravel package but GIT HUB package
use App\Product;
class shoppingController extends Controller
{
   public function cart(){
       return view('cart');
   }
   public function add_to_cart(){
       $product = Product::find(request()->prd_id);
       $cartItem = Cart::add([
           'id' => $product->id,
           'name' => $product->name,
           'qty' => request()->qty,
           // $ means object, method dosenot have $.
           'price' => $product->price,
           'weight' => 550,
       ]);
       // Next we associate a model with the item.
       Cart::associate($cartItem->rowId, 'App\Product');
       Session::flash('success', 'Product added to the cart');
       return redirect()->route('cart');
   }
   public function cart_delete($id){
       Cart::remove($id);
       Session::flash('success', 'Product removed');
       return redirect()->route('cart');
   }

   public function cart_incr($id,$qty){
       Cart::update($id,$qty+1);

       Session::flash('success','Product quontity incremented by 1');
       return redirect()->route('cart');
   }

   public function cart_decr($id,$qty){
    Cart::update($id,$qty-1);

    Session::flash('success','Product quontity decremented by 1');
    return redirect()->route('cart');
    }
    public function rapid_add($id){
       
       $product = Product::find($id);

       $cartItem = Cart::add([
           'id' => $product->id,
           'name' => $product->name,
           'qty' => 1,
           // $ means object, method dosenot have $.
           'price' => $product->price,
           'weight' => 550,
       ]);
       // Next we associate a model with the item.
       Cart::associate($cartItem->rowId, 'App\Product');
       Session::flash('success', 'Product added to the cart');
       return redirect()->route('cart');
    }

}