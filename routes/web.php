<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});


Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('stand','StandController');
    Route::resource('member','MemberController');
    Route::get('allocate/create/{id}','MemberStandController@create');
    Route::resource('allocate','MemberStandController');
    Route::resource('allocation/payment','AllocationPaymentController');

});

Route::resource('payment', 'PaymentController');


Route::get('paypal/return',function(){

    $token = $_GET['token'];
    $order = \App\Payment::where('reference',$token)->first();
    $order->status='APPROVED';
    $order->save();
   // return;
    $client =\App\Repositories\PayPal\PayPalClient::client();
    //dd($client);exit;
    //dd($token);
// Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
// $response->result->id gives the orderId of the order created above
$request = new \PayPalCheckoutSdk\Orders\OrdersCaptureRequest($token);
$request->prefer('return=representation');
try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);

    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    print_r($response);
} catch (Exception $ex) {
    //echo $ex->statusCode;
    echo $ex->getMessage();
}
});
