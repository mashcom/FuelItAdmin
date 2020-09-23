@extends('layouts.app')

@section('content')
    <h2 class="font-weight-bolder">Mobile API Endpoints</h2>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header font-weight-bold">Available Endpoints</div>
                <div class="card-body">
                    <div class="alert alert-success font-weight-bold">
                        To ensure easy integration with your apps use the JSON endpoints below
                    </div>
                    <table class="table table-sm">
                        <tr>
                            <th>URL</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td><span class="badge badge-light">/api/product</span></td>
                            <td>Retrieve all service stations and products</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-light">/api/product/{product_name}</span></td>
                            <td>Retrieve all station which have a product specified</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-light">/api/product/{product_name}/city/{city}</span></td>
                            <td>Retrieve all station in a city which have a product specified</td>

                        </tr>

                        <tr>
                            <td><span class="badge badge-light">/api/product/station/{station_id}</span></td>
                            <td>Retrieve all products for a station</td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

