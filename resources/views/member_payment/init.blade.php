@extends('layouts.app')

@section('content')
<h1 class="font-weight-bolder">Make Payment</h1>

<div class="card">
    <div class="card-header">
        Make Payment
    </div>
    <div class="card-body">
        <div class="p-2">
            <form method="get" action="{{url('/payment/create')}}">
                {{@csrf_field()}}
                @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
                <!-- Form Row-->
                <div class="form-row col-lg-6">
                    <!-- Form Group (first name)-->
                    <div class="form-group col-lg-12">
                        <label class="small mb-1 font-weight-bold" for="inputFirstName">National ID Number</label>
                        <input required class="form-control @error('national_id') is-invalid @enderror" value="{{ old('national_id') }}" id="national-id" name="national_id" type="text" placeholder="National ID Number">
                        @error('national_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <input type="submit" value="Initiate Payment" class="btn btn-success font-weight-bold">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection