@extends('layouts.payment_wizard')

@section('content')
<form method="get" action="{{url('/payment/create')}}">
    <div class="col-xl-5 col-lg-6 mx-auto col-md-8 col-sm-11 mt-4">
        <div class="card  h-100">
            <div class="card-body px-5 pt-5 d-flex flex-column">
                <div>
                    <div class="h3 text-primary font-weight-bold">Pay Your Stand Subscription</div>
                    <p class="text-muted mb-4">Enter your National ID Number to get started</p>
                </div>
                <div class="">
                    <div class="py-2">

                        {{@csrf_field()}}
                        @if(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @endif
                        <!-- Form Row-->
                        <div class="form-row">
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


                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent px-5 py-4">
                <div class="small text-center">
                    <button role="submit" name="find_allocations" class="btn btn-block btn-primary">Find Your Allocations</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection