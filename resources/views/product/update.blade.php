@extends('layouts.app')

@section('content')
    <h2 class="font-weight-bolder">Product Management</h2>
    <div class="row">

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header font-weight-bold">Update Product</div>
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
                    <form method="post" action="{{url("/product/$product->id")}}">
                        {{@csrf_field()}}
                        @method("PUT")

                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputFirstName">Name</label>
                            <input required class="form-control" id="inputName" name="name" type="text"
                                   placeholder="" value="{{$product->name}}">
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">USD$ Price</label>
                            <input required class="form-control" id="inputUsdName" name="usd_price" type="text"
                                   placeholder="" value="{{$product->usd_price}}">
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">ZWL$ Price</label>
                            <input required class="form-control" id="inputZwlPrice" name="zwl_price" type="text"
                                   placeholder="" value="{{$product->zwl_price}}">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save changes"/>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

