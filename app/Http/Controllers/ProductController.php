<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $discounts = Discount::all();
        return view('admin.products.create', compact('categories', 'discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
            'quantity' => 'required'
        ]);

        // Upload Files with new name
        $ex = $request->file('image')->getClientOriginalExtension();
        $single_name = 'vcommerce_'.time().'.'.$ex;
        $request->file('image')->move(public_path('images'), $single_name);

        $album_names = [];
        foreach($request->file('album') as $album) :
            $ex = $album->getClientOriginalExtension();
            $al_name = 'vcommerce_'.time().'.'.$ex;
            $album_names[] = $al_name;
            $album->move(public_path('images'), $al_name);
        endforeach;

        $album_names = implode(',', $album_names);

        Product::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'discount_id' => $request->discount_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'image' => $single_name,
            'album' => $album_names,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'serial_number' => $request->serial_number,
        ]);

        return redirect()->route('admin.products.index')->with('msg', 'Product Created Successfully')->with('type', 'success');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
