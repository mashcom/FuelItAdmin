@extends('layouts.app')

@section('content')
    <h1 class="font-weight-bolder">Stand Details</h1>
    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <div class="card invoice">
        <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                    <!-- Invoice branding-->
                    <div class="h2 text-white mb-0 font-weight-bolder">Stand Number: {{$stand->stand_number}}</div>
                    Location: {{$stand->location->name}}
                </div>

            </div>
        </div>
        <div class="card-body p-4 p-md-5">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Base Details</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Stand Number</td>
                    <td>{{ $stand->stand_number }}</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>{{ $stand->size }} {{ $stand->size_unit }}</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>{{ $stand->location->name }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        @if(empty($stand->allocation))
                            <span class="badge badge-secondary">Not Allocated</span>
                        @endif
                        @if(!empty($stand->allocation))
                            <span class="badge badge-success">Allocated</span>
                        @endif
                    </td>
                </tr>


                @if(!empty($stand->allocation))
                    <tr>
                        <td>Allocation Done By</td>
                        <td>{{ $stand->allocation->allocator->name }}</td>
                    </tr>
                    <tr>
                        <td>Allocation Recorded</td>
                        <td>{{ $stand->allocation->created_at }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Beneficiary Details</th>
                        <th scope="col"></th>
                    </tr>
                    <tr>
                        <td>Firstname(s)</td>
                        <td>{{ $stand->allocation->member->firstname }}</td>
                    </tr>
                    <tr>
                        <td>Surname</td>
                        <td>{{ $stand->allocation->member->surname }}</td>
                    </tr>
                    <tr>
                        <td>National ID Number</td>
                        <td>{{ $stand->allocation->member->national_id }}</td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection

