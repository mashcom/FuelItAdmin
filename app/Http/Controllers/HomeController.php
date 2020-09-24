<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Product;
use App\Station;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stations = Station::count();
        $products = Product::count();
        $users = User::count();
        $cities = Station::distinct('city')->count();

        $available = Availability::whereAvailable(1)->count();
        $not_available = Availability::whereAvailable(0)->count();
        $availability_ratio = ($available / ($available +  $not_available))*100;

        $stats = array("stations"=>$stations,"products"=>$products,"users"=>$users,"cities"=>$cities,"availability_ratio"=>$availability_ratio);
        return view('home',$stats);
    }
}
