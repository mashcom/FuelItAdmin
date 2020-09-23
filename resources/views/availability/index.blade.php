@extends('layouts.app')

@section('content')
    <h2 class="font-weight-bolder">Availability Management</h2>
    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header font-weight-bold">Products</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Availability</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="pl-2">
                                    <p class="font-weight-bolder">{{$product->name}}</p>
                                    <span class="badge badge-dark">USD${{$product->usd_price}}</span>
                                    <span class="badge badge-dark">ZWL${{$product->zwl_price}}</span>

                                </td>
                                <td>
                                    <?php

                                    $class="warning";
                                    if (@$product->availability->available == 1) {
                                        $class = "success";
                                        $product_available = "Available";
                                    } elseif (@$product->availability->available == 0) {
                                        $class = "danger";
                                        $product_available = "Not Available";
                                    } else {
                                        $class = "warning";
                                    }
                                    ?>
                                    <ul class="list-group">
                                        <li class="list-group-item"><span
                                                    class="badge badge-{{$class}}">{{($product->availability==null)?"Information Not Available":$product_available}}</span>
                                            <a href='{{url("/availability/$product->id/edit")}}' class="btn btn-primary btn-sm float-right"><i
                                                        class="fa fa-toggle-on"></i> Update Status
                                            </a>
                                        </li>
                                    </ul>
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

