<?php


namespace App\Repositories;


use App\Member;
use Illuminate\Support\Facades\Auth;

class MemberRepository
{
    public function getAll(){
        $members = Member::whereCompanyId(Auth::user()->company_id)->simplePaginate(200);
        return $members;
    }
}
