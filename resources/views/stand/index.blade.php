
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bolder">Stands</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Record of Stands</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-borderedd  table-striped  dataTable" id="dataTable" width="100%"
                                   cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                   style="width: 100%;">
                                <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">Stand Number</th>
                                    <th rowspan="1" colspan="1">Size</th>
                                    <th rowspan="1" colspan="1">Location</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($stands as $stand)
                                    <tr>
                                        <td>{{$stand->stand_number}}</td>
                                        <td>{{$stand->size." ".$stand->size_unit}}</td>
                                        <td>{{$stand->location->name}}</td>
                                        <td>
                                            @if(empty($stand->allocation))
                                                <span class="badge badge-secondary">Not Allocated</span>
                                            @endif
                                            @if(!empty($stand->allocation))
                                                <span class="badge badge-success">Allocated</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(empty($stand->allocation))
                                                <a href="<?php echo url("/allocate/create",$stand->id);?>" class="btn btn-success btn-sm btn-icon-split">
                                                <span class="icon text-white-50">
                                                  <i class="fas fa-check-circle"></i>
                                                </span>
                                                    <span class="text">Allocate</span>
                                                </a>
                                            @endif

                                                @if(!empty($stand->allocation))
                                                    <a href="#" class="btn btn-warning btn-sm btn-icon-split">
                                                <span class="icon text-white-50">
                                                  <i class="fas fa-trash-alt"></i>
                                                </span>
                                                        <span class="text">Deallocate</span>
                                                    </a>
                                                @endif

                                                @if(!empty($stand->allocation))
                                                    <a href="{{url('allocation/payment',$stand->allocation->id)}}" class="btn btn-secondary btn-sm btn-icon-split">
                                                <span class="icon text-white-50">
                                                  <i class="fas fa-money-bill"></i>
                                                </span>
                                                        <span class="text">Payments</span>
                                                    </a>
                                                @endif

                                            <a href="{{url('stand',$stand->id)}}" class="btn btn-primary btn-sm btn-icon-split">
                                                <span class="icon text-white-50">
                                                  <i class="fas fa-eye"></i>
                                                </span>
                                                <span class="text">View</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

