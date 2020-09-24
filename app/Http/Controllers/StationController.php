<?php

namespace App\Http\Controllers;

use App\Station;
use App\User;
use Illuminate\Http\Request;
use phpseclib\Crypt\Hash;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        return view('station.index', array('stations' => $stations));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('station.create');
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
            'name' => 'required|unique:stations,name',
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'user' => 'required',
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required',
        ]);

        $station = new Station();
        $station->name = $request->name;
        $station->city = $request->city;
        $station->latitude = $request->latitude;
        $station->longitude = $request->longitude;
        if (!$station->save()) {
            return back()->withErrors('Failed to add station details');
        }

        $user = new User();
        $user->name = $request->user;
        $user->email = $request->user_email;
        $user->password = \Illuminate\Support\Facades\Hash::make($request->user_password);
        $user->station_id = $station->id;
        if (!$user->save()) {
            $station->delete();
            return back()->withErrors('Failed to add user details');
        }
        return back()->with('success','Station added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Station $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Station $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Station $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Station $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        //
    }
}
