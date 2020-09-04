<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Repositories\PayPal;
use App\Repositories\MemberStandRepository;
use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $paymentRepository;
    private $memberStandRepository;

    public function __construct(PaymentRepository $paymentRepository, MemberStandRepository $memberStandRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->memberStandRepository = $memberStandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member_payment.init');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $national_id = $_GET['national_id'];
        $allocations = $this->memberStandRepository->getByNationalId($national_id);

        if ($allocations == null) {
            return back()->with('error', 'Member could not be found, please try again!')->withInput($_GET);
        }
        if (count($allocations->allocations) == 0) {
            return back()->with('error', 'No allocation found!')->withInput($_GET);
        }
        return view('member_payment.payment')->with(array('data' => $allocations));
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
            'amount' => 'required|min:1',
            'allocation_id' => 'required',
        ]);
        $selected_allocation_id = $request->allocation_id[0];
        $allocation = $this->memberStandRepository->getById($selected_allocation_id);
        $stand = $allocation->stand;
        $member = $allocation->member;

        $order_details = array('amount' => $request->amount, 'stand' => $stand, 'member' => $member);

        $order = \App\Repositories\PayPal\CreateOrder::createOrder($order_details);

        Payment::create(array(
                'transaction_date' => now(),
                'reference' => $order->result->id,
                'amount' => $request->amount,
                'source' => 'PAYPAL',
                'company_id' => $stand->company_id,
                'description' => 'Subscription Payment',
                'member_id' => $member->id,
                'allocation_id' => $selected_allocation_id,
                'status' => 'ORDER',
                'log_data' => json_encode($order),
            )
        );
        $checkout_url = "https://www.sandbox.paypal.com/checkoutnow?token=" . $order->result->id;
        return redirect($checkout_url);


        // return back()->with(array('order_initiated' => $request->amount, 'stand' => $stand, 'member' => $member));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
