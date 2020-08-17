@extends('layouts.app')

@section('content')
<script src="https://www.paypal.com/sdk/js?client-id=AZW1yB-6gz-Z7SqEhIp7R_m8CgN3lc1Wjrv7MJP2z6fHNYV5AU8OSsRGBCD0twG-7Se1vldpJWrmNdWH"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
</script>

<div class="card">
    <div class="card-header">
        Make Payment
    </div>
    <div class="card-body">
        <div id="paypal-button-container" class="col-lg-6"></div>
    </div>
</div>

<!-- Add the checkout buttons, set up the order and approve the order -->
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '25'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
            });
        }
    }).render('#paypal-button-container'); // Display payment options on your web page
</script>

@endsection
