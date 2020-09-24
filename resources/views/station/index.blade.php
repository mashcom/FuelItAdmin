@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bolder">Stations</h1>

    <div class="card mb-4">
        <div class="card-header">
            View Stations
            <a href="{{url('/station/create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square"></i> New Station</a>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif

            <table id="dataTable" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Products</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stations as $station)
                    <tr class="text-md">
                        <td>{{$station->name}}</td>
                        <td>{{$station->city}}</td>
                        <td>{{$station->products->count()}}</td>
                        <td>{{$station->latitude}}</td>
                        <td>{{$station->longitude}}</td>
                        <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection

