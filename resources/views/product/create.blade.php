@extends('layouts.app')

@section('content')
    <h2 class="font-weight-bolder">Product Management</h2>
    <div class="row">

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header font-weight-bold">Add Product</div>
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
                    <form method="post" action="{{url('/product')}}">
                        {{@csrf_field()}}

                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputFirstName">Name</label>
                            <input required class="form-control" id="inputName" name="name" type="text"
                                   placeholder="">
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">USD$ Price</label>
                            <input required class="form-control" id="inputUsdName" name="usd_price" type="text"
                                   placeholder="">
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="small mb-1" for="inputLastName">ZWL$ Price</label>
                            <input required class="form-control" id="inputZwlPrice" name="zwl_price" type="text"
                                   placeholder="">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save changes"/>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header font-weight-bold">Products</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>USD Price</th>
                            <th>ZWL Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->usd_price}}</td>
                                <td>{{$product->zwl_price}}</td>
                                <td>
                                    <a href="{{url("/product/$product->id/edit")}}"
                                       class="btn btn-sm btn-primary"><i class="fa fa-adjust"></i> Update</a>
                                    <form action="{{url('/product',$product->id)}}" method="post">
                                        {{csrf_field()}}
                                        @method('DELETE')
                                        <button role="submit" class="btn btn-sm btn-danger mt-2"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

