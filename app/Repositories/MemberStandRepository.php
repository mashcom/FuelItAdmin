<?php


namespace App\Repositories;


use App\MemberStand;

class MemberStandRepository
{

    public function is_allocated($stand_id)
    {
        $allocation = MemberStand::where('stand_id', $stand_id)->first();
        if (empty($allocation)) return FALSE;
        return TRUE;
    }

}
