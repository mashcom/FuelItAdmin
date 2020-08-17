@extends('layouts.app')

@section('content')
    <h1 class="font-weight-bolder">Allocate Stand</h1>

    <div class="card mb-4">
        <div class="card-header">Stand Details</div>
        <div class="card-body">
            @if($allocated)
                <div class="alert alert-danger">
                    This stand is already allocated
                </div>
            @endif
            <table class="table">
                <tr>
                    <td>Stand Number</td>
                    <td class="font-weight-bolder h4">{{$stand->stand_number}}</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>{{$stand->size}} {{$stand->size_unit}}</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>{{$stand->location->name}} </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">Allocation Details</div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif

            @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
            <div class="alert alert-info font-weight-bold">
                Select the member to allocate stand below
            </div>
            <form method="post" action="{{url('/allocate')}}">
                {{@csrf_field()}}

                <div class="form-row">
                    <!-- Form Group (first name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputFirstName">Search Member</label>
                        <input hidden readonly name="stand_id" value="{{$stand->id}}"/>
                        <select required class="form-control" name="member_id">
                            <option value=""></option>
                            @foreach($members as $member)
                                <option value="{{$member->id}}">{{$member->firstname}} {{$member->surname}}
                                    ({{$member->national_id}})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr/>
                <div class="form-row">
                    <!-- Form Group (first name)-->

                    <div class="form-group col-md-6">
                        <p class="text-danger font-weight-bolder h4">{{$challenge}}</p>
                        <input disabled hidden required class="form-control" name="challenge" value="{{$challenge}}"/>
                        <label class="small mb-1" for="inputFirstName">Type the number above to confirm
                            allocation</label>
                        <input required class="form-control" name="challenge_response"/>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary font-weight-bold" value="Allocate Stand"/>
            </form>
        </div>
    </div>
@endsection

