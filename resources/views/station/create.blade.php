@extends('layouts.app')

@section('content')
    <h2 class="font-weight-bolder">Station Management</h2>
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                    <div class="card-header font-weight-bold">Add Station</div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-xs">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{url('/station')}}">
                        {{@csrf_field()}}

                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputFirstName">Name e.g Total 3rd Street</label>
                            <input required class="form-control" id="inputName" name="name" type="text"
                                   placeholder="">
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">City</label>
                            <input required class="form-control" id="inputCity" name="city" type="text"
                                   placeholder="">
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">Latitude</label>
                            <input required class="form-control" id="inputZwlPrice" name="latitude" type="text"
                                   placeholder="">
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">Longitude</label>
                            <input required class="form-control" id="inputZwlPrice" name="longitude" type="text"
                                   placeholder="">
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">Admin Fullname</label>
                            <input required class="form-control" id="inputZwlPrice" name="user" type="text"
                                   placeholder="">
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">Admin Email</label>
                            <input required class="form-control" id="inputZwlPrice" name="user_email" type="email"
                                   placeholder="">
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">Admin Password</label>
                            <input required class="form-control" id="inputZwlPrice" name="user_password" type="text"
                                   placeholder="">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save"/>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection

