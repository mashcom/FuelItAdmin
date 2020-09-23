<?php

namespace App\Http\Controllers;

use App\Product;
use App\Station;
use Illuminate\Http\Request;

class APIController extends Controller
{

    /**
     * Get all products
     * @return \Illuminate\Http\JsonResponse
     */
    public function products()
    {
        $products = Product::with('station', 'availability')->get();
        return response()->json(array("status" => TRUE, "data" => $products));
    }

    /**
     * Get products by name
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_by_name($name)
    {
        $product = Product::with('station', 'availability')
            ->whereName($name)
            ->get();

        $product = $product->where('availability.available', 1);
        //dd($response);
        return response()->json(array("status" => TRUE, "data" => $product));

    }

    /**
     * Search by product name and city
     * @param $name
     * @param $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($name, $city)
    {
        $product = Product::with('station', 'availability')
            ->where('name', $name)
            ->get();
        return response()->json(array("status" => TRUE, "data" => $product->where('station.city', $city)));
    }

    /**
     * Search station by id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function station($id)
    {
        $product = Product::with('station', 'availability')
            ->where('station_id', $id)
            ->get();
        return response()->json(array("status" => TRUE, "data" => $product));
    }

    /**
     * Get Featured Stations
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function featured_stations($city = null)
    {
        if (empty($city)) {
            $product = Station::with('products.availability')
                ->distinct('id')
                ->get();
        } else {
            $product = Station::with('products.availability')
                ->whereCity($city)
                ->get();
        }
        return response()->json(array("status" => TRUE, "data" => $product));
    }

    /**
     * Search Stations
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function search_stations($name, $city = null)
    {

        if ($city == null) {
            $product = Station::with('products.availability')
                ->where('name', 'like', "%$name%")
                ->orderBy('id')
                ->limit(100)
                ->orderBy('city')
                ->get();
        } else {
            $product = Station::with('products.availability')
                ->where('name', 'like', "%$name%")
                ->where('city', 'like', "%$city%")
                ->orderBy('city')
                ->limit(100)
                ->get();
        }

        return response()->json(array("status" => TRUE, "data" => $product));
    }

}
