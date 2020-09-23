<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('availability')->whereStationId(Auth::user()->station_id)->get();
        return view('availability.index')->with(array('products' => $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Availability $availability
     * @return \Illuminate\Http\Response
     */
    public function show(Availability $availability)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Availability $availability
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $product = Product::whereId($product_id)->whereStationId(Auth::user()->station_id)->firstOrFail();
        $availability = Availability::whereProductId($product->id)->first();
        return view("availability.update", array("product" => $product, "availability" => $availability));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Availability $availability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {

        $request->validate([
           'available'=>'required'
        ]);
        $availability = Availability::firstOrCreate(["product_id" => $product_id]);
        $availability->available = $request->available;
        if ($availability->save()) {
            return back()->with('success', 'Product Availability Updated!');
        }
        return back()->withErrors(array('Product Availability Failed to update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Availability $availability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Availability $availability)
    {
        //
    }
}
