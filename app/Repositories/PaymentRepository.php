<?php


namespace App\Repositories;


use App\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentRepository
{

    /**
     * Get all payment made towards an allocation
     * @param $allocation_id
     * @return mixed
     */
    public function allocation($allocation_id){
        $payments = Payment::whereCompanyId(Auth::user()->id)->whereAllocationId($allocation_id)->get();
        return $payments;
    }

    
}
