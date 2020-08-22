<?php

namespace App\Http\Controllers;

use App\Member;
use App\MemberContact;
use App\Repositories\MemberRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    private $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = $this->memberRepository->getAll();
        return view('member.index', array('members' => $members));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = new Member();
        $member->firstname = $request->firstname;
        $member->surname = $request->surname;
        $member->national_id = $request->national_id;
        $member->company_id = Auth::user()->company_id;
        $member->saveOrFail();


        DB::table('member_contacts')->insertOrIgnore([
            ['member_id' => $member->id, 'contact_type' => 'email', 'contact' => $request->email],
            ['member_id' => $member->id, 'contact_type' => 'phone', 'contact' => $request->phone],
            ['member_id' => $member->id, 'contact_type' => 'address', 'contact' => $request->address],
        ]);
        if ($member->save()) {
            return back()->with('success', 'Member added successfully');
        }
        return back()->with('error', 'Member could not be added, please try again!')->withInput($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
