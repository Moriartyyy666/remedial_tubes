@extends('staff-dashboard-layout.dashboard-template')
@php
    $totalleave = 0;
@endphp
@foreach ($leave_type as $key => $data)
    @php
        $totalleave += $data->count;
    @endphp
@endforeach
@php
    $val = $totalleave - count($leave_data);
@endphp
@if ($val <= 0)
    @section('dashboard-staff-content')
        <x-error-box />
        @if (session()->has('message'))
            <div id="successBox" style="text-align:center;margin-top:20px;"
                class="alert alert-success col-md-12 alert-dismissible fade show" role="alert">
                <strong> {{ session()->get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    $("#successBox").delay(3000).fadeOut("slow");
                }, 1000);
            </script>
        @endif
        <br>
        <h4>Number of Leaves Remaining: <span style="text-weight:bold; color:blue;">{!! $val !!}</span> </h4>
        <h4>You have No Leaves Remaining </h4>
        <div class="card">
            <div class="card-body">
                <h3 class="panel-title" style="text-align:center;">My Pending Requests</h3>
                <br>
                @foreach ($leave_pending_data as $key => $data)
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>{{ $data->date_of_leave }}</strong>
                            <i class="float-right" style="font-size:85%;">Request sent on :-
                                {{ $data->date_of_request }}</i>
                        </div>
                        <div class="card-body">
                            {{ getLeaveTypeName($data->type_of_leave, $leave_type) }}
                            <p class="card-text">{{ $data->description }}</p>
                            <a class="btn btn-danger float-right confirmation"
                                href="/delete-leave-pending-request-in-staff-account/{{ $data->auto_id }}">Delete
                                Request</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
@endif
@if ($val > 0)
    @section('dashboard-staff-content')
        <x-error-box />
        @if (session()->has('message'))
            <div id="successBox" style="text-align:center;margin-top:20px;"
                class="alert alert-success col-md-12 alert-dismissible fade show" role="alert">
                <strong> {{ session()->get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    $("#successBox").delay(3000).fadeOut("slow");
                }, 1000);
            </script>
        @endif
        <div class="card">
            <div class="card-body">
                <h3 class="panel-title" style="text-align:center;">Requesting for leave</h3>
                <br>
                <form action="/insert-leave-data-of-staff-account" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="type_of_leave" class="col-sm-2 col-form-label">Type of Leave</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="type_of_leave" id="type_of_leave"
                                aria-label="Default select example" required>
                                <option selected disabled>Select a Leave Type</option>
                                @foreach ($leave_type as $key => $data)
                                    @php($remainingLeave = $data->count)
                                    @foreach ($leave_count as $object)
                                        @if ($data->id == $object->type_of_leave)
                                            @php($remainingLeave -= $object->total)
                                        @endif
                                    @endforeach
                                    <option style="color:black"> {{ $data->leave_type_name }}
                                        <optgroup label="Remaining: {{ $remainingLeave }}" style="color:green"></optgroup>
                                        <optgroup label="Total: {{ $data->count }}" style="color:red"></optgroup>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="description" id="description" placeholder="Enter the description" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_of_leave" class="col-sm-2 col-form-label">Date of Leave</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="date_of_leave" name="date_of_leave" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
                        <div class="col-sm-8">
                            <input class="btn btn-primary col-md-2 col-sm-12" value="Submit" id="button" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <h4>Number of Leaves Remaining: <span style="text-weight:bold; color:blue;">{!! $val !!}</span> </h4>
        <div class="card">
            <div class="card-body">
                <h3 class="panel-title" style="text-align:center;">My Pending Requests</h3>
                <br>
                @foreach ($leave_pending_data as $key => $data)
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>{{ $data->date_of_leave }}</strong>
                            <i class="float-right" style="font-size:85%;">Request sent on :-
                                {{ $data->date_of_request }}</i>
                        </div>
                        <div class="card-body">
                            {{ getLeaveTypeName($data->type_of_leave, $leave_type) }}
                            <a class="btn btn-danger float-right confirmation"
                                href="/delete-leave-pending-request-in-staff-account/{{ $data->auto_id }}">Delete
                                Request</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
@endif
<script>
    window.onload = function() {
        $(".nav-item:eq(0)").addClass("active");
        $('.confirmation').on('click', function() {
            return confirm('Are you sure to delete?');
        });
    }
</script>
