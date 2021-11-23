<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
}
