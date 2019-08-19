<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Session;
use Cart;
use App\Mail\PurchaseSuccessful;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function payment(){
        Stripe::setApiKey("sk_test_8C4SA02JNrG3SUH98wy8eaLD00nEBg8jAp");
    

    $token = request()->stripeToken;

    $charge = Charge::create([
        'amount' => Cart::total() * 100,
        'currency' => 'usd',
        'description' => 'Laravel stripe demo',
        'source' => $token,
    ]);

    Session::flash('success','Purchase successfully');

    Cart::destroy();

    Mail::to(request()->stripeEmail)->send(new PurchaseSuccessful);
    return redirect('/');
    }
}