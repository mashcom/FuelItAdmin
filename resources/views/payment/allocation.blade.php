@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bolder">Allocation Payments</h1>

    <div class="card mb-4">
        <div class="card-header">Details</div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
            @if($payments->count()==0)
            <div class="alert alert-warning"><i class="fa fab fa-warning"></i>No transactions were found, for this allocation</div>
            @else
                <table class="table table-bordered table-sm table-striped">
                    <thead>
                    <tr>
                        <th>Transaction Date</th>
                        <th>Reference</th>
                        <th>Source</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr style="font-size: 12px">
                            <td>{{$payment->transaction_date}}</td>
                            <td>{{$payment->reference}}</td>
                            <td>{{$payment->source}}</td>
                            <td>{{$payment->description}}</td>
                            <td>{{$payment->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection

