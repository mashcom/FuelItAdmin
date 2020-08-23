@extends('layouts.payment_wizard')

@section('content')

@if(!Session::has('order_initiated'))
<div class="card col-lg-6 p-0 mt-4 mx-auto animated--fade-in-up">

    <div class="card-body">
        <a href="{{url('/payment')}}" class="btn btn-outline-primary mb-3">Back</a>
        <div>
            <div class="h3 text-primary font-weight-bold">Select Stand</div>
            <p class="text-muted mb-4">Select the stand you wish to pay for</p>
        </div>
        <div class="p-2">
            <form method="post" action="{{url('/payment')}}">
                {{@csrf_field()}}

                <!-- Form Row-->
                <div class="form-row">
                    @if ($errors->any())
                    <div class="alert alert-danger col-lg-12">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form Group (first name)-->
                    <div class="form-group col-lg-12">
                        <label class="font-weight-bold mb-1" for="inputFirstName">Select Stand Allocation</label>
                        <ul class="list-group">
                            @foreach($data->allocations as $allocation)
                            <div class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allocation_id[]" value="{{$allocation->id}}">
                                    <label class="form-check-label" for="exampleRadios1">
                                        <p class="p-0 m-0 font-weight-bold h5">{{$allocation->stand->stand_number}}, {{$allocation->stand->location->name}}</p>
                                        <p class="p-0 m-0">Developer: <span class=" badge badge-success">{{$allocation->stand->company->name}}</span></p>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </ul>
                        @error('national_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Form Group (last name)-->
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold mb-1" for="inputLastName">Amount</label>
                        <input required class="form-control form-control-lg @error('amount') is-invalid @enderror" value="{{ old('amount') }}" id="amount" name="amount" type="number" min="1" placeholder="Enter amount">
                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <input type="submit" value="Initiate Payment" class="btn btn-primary btn-block btn-lg">
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@if(Session::has('order_initiated'))
<div class="card col-lg-6 p-0 mt-4 mx-auto">

    <div class="card-body">
        <a href="{{ url()->full() }}" class="btn btn-outline-primary mb-3">Back</a>
        <div>
            <div class="h3 text-primary font-weight-bold">Verify & Finalise Payment</div>
            <p class="text-muted mb-4">Verify the correctness of details and make payment if they are correct</p>
        </div>

        <?php
        $stand = Session::get('stand');
        $member = Session::get('member');
        $amount = Session::get('order_initiated');
        ?>
        <table class="table table-bordered table-striped table-sm p-2">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Stand Details</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Stand Number</td>
                    <td>{{ $stand->stand_number }}</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>{{ $stand->size }} {{ $stand->size_unit }}</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>{{@$stand->location->name }}</td>
                </tr>
                <tr>
                    <td>Developer</td>
                    <td>{{@$stand->company->name }}</td>
                </tr>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Beneficiary Details</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tr>
                    <td>Firstname(s)</td>
                    <td>{{ $member->firstname }}</td>
                </tr>
                <tr>
                    <td>Surname</td>
                    <td>{{ $member->surname }}</td>
                </tr>
                <tr>
                    <td>National ID Number</td>
                    <td>{{ $member->national_id }}</td>
                </tr>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Payment Details</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tr>
                    <td>Amount Tendered</td>
                    <td>
                        <h3 class="font-weight-bold text-primary h5">USD${{$amount}}</h3>
                    </td>
                </tr>

            </tbody>
        </table>
        <div class="alert alert-danger font-weight-bold">Please confirm the stand details before making
            payment!
        </div>
        <div id="paypal-button-container" class="col-lg-12 p-0">

        </div>
        <script type="application/javascript" src="https://www.paypal.com/sdk/js?client-id=AXl7AB-E7MDwT0h3-U0fASgrUBdjVbQYXuCFX-cOwH5ygBzfMpKDA-z799M2b7WK3wz4EVZVvy92O5yJ">
        </script>
        <script type="application/javascript">
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        intent: "CAPTURE",
                        purchase_units: [{
                            amount: {
                                value: <?php echo $amount; ?>
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        console.log(details)
                        alert('Transaction completed by ' + details.payer.name.given_name);
                    });
                }
            }).render('#paypal-button-container');
        </script>
    </div>
</div>
@endif

@endsection