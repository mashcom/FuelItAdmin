@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">Account Details</div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
            <form method="post" action="{{url('/member')}}">
            {{@csrf_field()}}

            <!-- Form Row-->
                <div class="form-row">
                    <!-- Form Group (first name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputFirstName">First name</label>
                        <input required class="form-control" id="inputFirstName" name="firstname" type="text"
                               placeholder="Enter first name">
                    </div>
                    <!-- Form Group (last name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputLastName">Last name</label>
                        <input required class="form-control" id="inputLastName" name="surname" type="text"
                               placeholder="Enter last name">
                    </div>
                </div>
                <!-- Form Row        -->
                <div class="form-row">
                    <!-- Form Group (organization name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputOrgName">National Identity Number</label>
                        <input required class="form-control" id="inputOrgName" name="national_id" type="text"
                               placeholder="Enter National ID">
                    </div>

                </div>

                <div class="form-row">
                    <!-- Form Group (organization name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputOrgName">Phone Number</label>
                        <input required class="form-control" id="inputOrgName" name="phone" type="text"
                               placeholder="Enter phone number">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputOrgName">Email Address</label>
                        <input required class="form-control" id="inputOrgName" name="email" type="email"
                               placeholder="Enter email address">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputOrgName">Address</label>
                        <textarea required class="form-control" rows="3" id="inputOrgName" name="address" type="text"
                                  placeholder="Enter address"></textarea>
                    </div>

                </div>
                <!-- Save changes button-->
                <input type="submit" class="btn btn-primary" value="Save changes"/>
            </form>
        </div>
    </div>
@endsection

