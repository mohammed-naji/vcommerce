<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all(); // select * from categories
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        //create
        Category::create([
            'name' => $request->name, // Men Clothes
            'slug' => Str::slug($request->name) // men-clothes
        ]);

        // return with message
        return redirect()->route('admin.categories.index')->with('msg', 'Category Created Successfully')->with('type', 'success');
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
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
        //validation
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id
        ]);

        //update
        Category::findOrFail($id)->update([
            'name' => $request->name, // Men Clothes
            'slug' => Str::slug($request->name) // men-clothes
        ]);

        // return with message
        return redirect()->route('admin.categories.index')->with('msg', 'Category Updated Successfully')->with('type', 'primary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        // return with message
        return redirect()->route('admin.categories.index')->with('msg', 'Category Deleted Successfully')->with('type', 'danger');
    }
}
