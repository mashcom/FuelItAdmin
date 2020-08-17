<?php

namespace App\Http\Controllers;

use App\Http\Resources\StandResource;
use App\Repositories\StandRepository;
use App\Stand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandController extends Controller
{
    private $standRepository;

    public function __construct(StandRepository $standRepository)
    {
        $this->standRepository = $standRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stands = $this->standRepository->getAll();
        return  view('stand.index',array('stands'=>$stands));

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
        $stand = new Stand();
        $stand->size = $request->size;
        $stand->size_unit = $request->size_unit;
        $stand->location_id = $request->location_id;
        $stand->company_id = Auth::user()->company_id;
        $stand->stand_number = $request->stand_number;
        if ($stand->save()) {
            return response()->json(array("success" => true, "data" => $stand));
        }
        return response()->json(array("success" => false, "data" => $stand));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Stand $stand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $stand = $this->standRepository->findById($id);
        return  view('stand.show',array('stand'=>$stand));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Stand $stand
     * @return \Illuminate\Http\Response
     */
    public function edit(Stand $stand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Stand $stand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stand $stand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Stand $stand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stand $stand)
    {
        //
    }
}
