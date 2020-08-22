@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bolder">Members</h1>

    <div class="card mb-4">
        <div class="card-header">Members</div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Surname</th>
                    <th>National ID #</th>
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{$member->firstname}}</td>
                        <td>{{$member->surname}}</td>
                        <td>{{$member->national_id}}</td>
                        <td>
                            <a href="{{url('$member',$member->id)}}" class="btn btn-primary btn-sm btn-icon-split">
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
@endsection

