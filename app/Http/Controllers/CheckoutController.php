<?php

namespace App\Http\Controllers;
use Mail;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function pay()
    {
        Stripe::setApiKey('sk_test_kcjZq4WJsR9LNNWpm0cwnwhy00vpaq8w24');
        Charge::create([
            'amount' => Cart::total()*100,
            'currency' => 'usd', 
            'description'=>'This is fake charging',
            'source' => request()->stripeToken
        ]);
        Cart::destroy();
        Session()->flash('success','Purchasing succeeded !');
        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchasingEmail);
        return redirect('/');



    }
}
