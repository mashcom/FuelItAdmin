<?php

namespace App\Repositories\PayPal;

use App\Repositories\PayPal\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class CreateOrder
{

    /**
     * Create a PayPal Order
     * @param array $order_details
     * @param false $debug
     * @return \PayPalHttp\HttpResponse
     */
    public static function createOrder($order_details = array(), $debug = FALSE)
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = self::buildRequestBody($order_details);

        $client = PayPalClient::client();
        $response = $client->execute($request);
        if ($debug) {
            echo json_encode($response->result, JSON_PRETTY_PRINT);
        }
        return $response;
    }

    /**
     * Setting up the JSON request body for creating the order with minimum request body. The intent in the
     * request body should be "AUTHORIZE" for authorize intent flow.
     *
     */
    private static function buildRequestBody($order_details = array())
    {
        $amount = $order_details["amount"];
        $stand_number = $order_details['stand']['stand_number'];
        $location = $order_details['stand']['location']['name'];
        $company = $order_details['stand']['company']['name'];
        $soft_descriptor = "STAND:$stand_number USD$amount";
        $description = "Stand payment: Stand # $stand_number, $location to $company";

        return array(
            'intent' => 'CAPTURE',
            'application_context' =>
                array(
                    'brand_name' => $company,
                    'return_url' => url('/paypal/return'),
                    'cancel_url' => url('/paypal/cancel'),
                ),
            'purchase_units' =>
                array(
                    0 =>
                        array(
                            'description' => $description,
                            'soft_descriptor' => $soft_descriptor,
                            'amount' =>
                                array(
                                    'currency_code' => 'USD',
                                    'value' => $amount,
                                ),
                        ),
                ),
        );
    }
}


/**
 *This is the driver function that invokes the createOrder function to create
 *a sample order.
 */
if (!count(debug_backtrace())) {
    CreateOrder::createOrder(TRUE);
}
