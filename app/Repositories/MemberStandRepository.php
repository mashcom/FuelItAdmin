<?php


namespace App\Repositories;


use App\MemberStand;
use App\Payment;
use App\Member;
use Illuminate\Support\Facades\Auth;

class MemberStandRepository
{

    public function is_allocated($stand_id)
    {
        $allocation = MemberStand::where('stand_id', $stand_id)->first();
        if (empty($allocation)) return FALSE;
        return TRUE;
    }

    public function getById($id){
        $allocation = MemberStand::with('stand','member')->find($id);
        return $allocation;
    }

    public function getByNationalId($national_id){

        $allocations = Member::with('allocations.stand','allocations.stand.location', 'allocations.stand.company')
        ->where('national_id',$national_id)
        ->first();
        
        return $allocations;

    }


}
