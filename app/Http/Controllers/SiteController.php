<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Checkout\CheckoutApi;
use Illuminate\Http\Request;
use Checkout\Models\Tokens\Card;
use Illuminate\Support\Facades\Auth;
use Checkout\Models\Payments\Payment;
use Checkout\Models\Payments\TokenSource;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::latest()->limit(8)->get();
        return view('website.index', compact('products'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('website.category')->with('category', $category);
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('website.show', compact('product'));
    }

    public function buy(Request $request)
    {
        Cart::create($request->except('_token'));
        if($request->type == 'cart') {
            $msg = 'Product added to cart successfully';
        }else {
            $msg = 'Product added to wishlist successfully';
        }
        return redirect()->back()->with('success', $msg);
    }

    public function remove_item($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Product romeved from cart successfully');
    }

    public function checkout()
    {
        return view('website.checkout');
    }

    public function payment(Request $request)
    {
        $total = 0;
        foreach (Auth::user()->carts()->where('type', 'cart')->get() as $item){
            $total += $item->product->price;
        }
// Set the secret key
$secretKey = 'sk_test_bd926df9-453b-4096-9a80-3ac332645404';

// Initialize the Checkout API in Sandbox mode. Use new CheckoutApi($liveSecretKey, false); for production
$checkout = new CheckoutApi($secretKey);


// Create a payment method instance with card details
$method = new TokenSource($request->token);

// Prepare the payment parameters
$payment = new Payment($method, 'USD');
$payment->amount = $total * 100; // = 10.00

// Send the request and retrieve the response
$response = $checkout->payments()->request($payment);

    if($response->status == 'Authorized') {

        // create new order and update the cart order_id


        return route('success');
    }else {
        return route('fail');
    }

    }
}
