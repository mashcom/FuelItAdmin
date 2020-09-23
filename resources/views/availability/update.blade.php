@extends('layouts.app')

@section('content')
    <h2 class="font-weight-bolder">Availability Management</h2>
    <div class="row">

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header font-weight-bold">Update</div>
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
                    <form method="post" action="{{url("/availability/$product->id")}}">
                        {{@csrf_field()}}
                        @method("PUT")
                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputFirstName">Product</label>
                            <input required class="form-control" readonly id="inputName" name="name" type="text"
                                   placeholder="" value="{{$product->name}}"/>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">Select Status</label>

                            <select class="form-control" name="available" id="available">
                                <option {{($availability->product_id==$product->id)?"selected":""}} value=""></option>
                                <option {{($availability->product_id==$product->id)?"selected":""}} value="0">Not Available</option>
                                <option {{($availability->product_id==$product->id)?"selected":""}}  value="1">Available</option>
                            </select>
                        </div>


                        <input type="submit" class="btn btn-primary" value="Save changes"/>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

