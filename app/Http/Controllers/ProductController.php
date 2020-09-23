<?php

namespace App\Http\Controllers;

use App\Product;
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
        $products = Product::whereStationId(Auth::user()->station_id)->get();
        return view('product.create')->with(array('products' => $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'zwl_price' => 'required|numeric|min:0.1|max:100000',
            'usd_price' => 'required|numeric|min:0.1|max:100000',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->station_id = Auth::user()->station_id;
        $product->zwl_price = $request->zwl_price;
        $product->usd_price = $request->usd_price;
        if ($product->save()) {
            return back()->with('success', 'Product Added Succesfully');
        }
        return back()->withErrors(array('There was a problem saving new product'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("product.update",array("product"=>$product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required',
            'zwl_price' => 'required|numeric|min:0.1|max:100000',
            'usd_price' => 'required|numeric|min:0.1|max:100000',
        ]);

        //$product = new Product();
        if($product->station_id != Auth::user()->station_id){
            return back()->withErrors(array("You do not have permission to update product"));
        }
        $product->name = $request->name;
        $product->station_id = Auth::user()->station_id;
        $product->zwl_price = $request->zwl_price;
        $product->usd_price = $request->usd_price;
        if ($product->save()) {
            return redirect('/product')->with('success', 'Product Updated Succesfully');
        }
        return back()->withErrors(array('There was a problem saving new product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Product::whereId($id)->whereStationId(Auth::user()->station_id)->delete()) {
            return back()->with('success', 'Product Removed Successfully');
        }
        return back()->withErrors(array('There was an error deleting product'));
    }
}
