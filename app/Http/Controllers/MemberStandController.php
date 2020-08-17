<?php

namespace App\Http\Controllers;

use App\Member;
use App\MemberStand;
use App\Repositories\MemberStandRepository;
use App\Repositories\StandRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberStandController extends Controller
{
    private $memberStandRepository;
    private $standRepository;

    public function __construct(MemberStandRepository $memberStandRepository, StandRepository $standRepository)
    {
        $this->memberStandRepository = $memberStandRepository;
        $this->standRepository = $standRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $allocated = $this->memberStandRepository->is_allocated($id);

        if($allocated){
            return redirect("/stand/$id");
        }
        $stand_details = $this->standRepository->findById($id);
        $members = Member::belongsToCompany()->orderBy('firstname')->get();
        $data = array(
            'allocated' => $allocated,
            'stand' => $stand_details,
            'members' => $members,
            'challenge'=>rand(9000,1000000)
        );
        return view('allocate.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allocation = new MemberStand();
        $allocation->member_id = $request->member_id;
        $allocation->stand_id = $request->stand_id;
        $allocation->allocated_by = Auth::user()->id;
        if($allocation->save()){
            return redirect("/stand/$request->stand_id")->with('success','Stand Allocation Success');
        }
        return back()->with('error','Stand allocation failed, please try again');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\MemberStand $memberStand
     * @return \Illuminate\Http\Response
     */
    public function show(MemberStand $memberStand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\MemberStand $memberStand
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberStand $memberStand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\MemberStand $memberStand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberStand $memberStand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\MemberStand $memberStand
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberStand $memberStand)
    {
        //
    }
}
