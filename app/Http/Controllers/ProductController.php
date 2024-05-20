<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products= Product::get();
        return view('products.index',['product'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,gif|max:100000'
        ]);

        //
        $imageName= time().'.'. $request->image->extension();
        $request->image->move(public_path('products'),$imageName);

        $product=new  Product;

        $product->name=$request->name;
        $product->description=$request->description;
        $product->image=$imageName;

        $product->save();
        return back()->withSuccess('Product created Successfully!!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product=Product::where('id',$id)->first();

        return view('products.show',['product'=>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product=Product::where('id',$id)->first();
       return view('products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:png,jpg,jpeg,gif|max:100000'
        ]);

        $product=Product::where('id',$id)->first();

        if(isset($request->image)){
            $imageName= time().'.'. $request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image=$imageName;
        }

        

        $product->name=$request->name;
        $product->description=$request->description;
       

        $product->save();
        return back()->withSuccess('Product Updated Successfully!!!!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted Successfully!!!!');

    }
}
