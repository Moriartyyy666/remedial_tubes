@extends('staff-dashboard-layout.dashboard-template')
@section('dashboard-staff-content')
@php
$totalleave = 0;
@endphp
@foreach($leave_type as $key => $data)
@php
$totalleave += $data->count;
@endphp
@endforeach
@php
$val = $totalleave - count($leave_data);
@endphp
@if($errors->any())
  @foreach ($errors->all() as $error)
      <div id="errorBox" style="text-align:center;margin-top:20px;" class="alert alert-danger col-md-12 alert-dismissible fade show" role="alert">
          <strong>{!!$error!!}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <script>
        window.onload = function() {
          $("#errorBox").delay(3000).fadeOut("slow");
        };
      </script>
  @endforeach
@endif
@if(session()->has('message'))
    <div id="successBox" style="text-align:center;margin-top:20px;" class="alert alert-success col-md-12 alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('message') }}</strong>
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
        <h3 class="panel-title" style="text-align:center;">Search Filter</h3>
        <br>
        <form action="/filter-search-leave-history-of-staff-account" method="POST">
          {{ csrf_field() }}
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="type_of_leave">Type of Leave</label>
              <select class="form-control" name="type_of_leave" id="type_of_leave" aria-label="Default select example" required>
              @foreach($leave_type as $key => $data)
            <option>{{ $data->leave_type_name }}</option>
              @endforeach
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="year">Year</label>
              <select class="form-control" name="year" id="year" aria-label="Default select example" required>
                <option value="All" selected>All</option>
                @for ($i = 2021; $i <= 2121; $i++)
                <option value='{{ $i }}'>{{ $i }}</option>
                @endfor
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="month">Month</label>
              <select class="form-control" name="month" id="month" aria-label="Default select example" required>
                <option value="All" selected>All</option>
                <option value='01'>January</option>
                <option value='02'>February</option>
                <option value='03'>March</option>
                <option value='04'>April</option>
                <option value='05'>May</option>
                <option value='06'>June</option>
                <option value='07'>July</option>
                <option value='08'>August</option>
                <option value='09'>September</option>
                <option value='10'>October</option>
                <option value='11'>November</option>
                <option value='12'>December</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="status">Status</label>
              <select class="form-control" name="status" id="status" aria-label="Default select example" required>
                <option value="All" selected>All</option>
                <option value="[ACCEPTED]">Accepted</option>
                <option value="[DECLINED]">Declined</option>
              </select>
            </div>
          </div>
          <input class="btn btn-primary float-right" value="Search" type="submit">
        </form>
      </div>
</div>
<br>
<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">My Leave History</h3>
      <h4>Number of Leaves: <span style="text-weight:bold; color:blue;">{{ count($leave_data) }}</span> </h4>
      <h4>Number of Leaves Remaining: <span style="text-weight:bold; color:blue;">{{ $val }}</span> </h4>
      <hr>
      <br>
      @foreach ($leave_data as $key => $data)
          <div class="card mb-3">
            @if($data->approval_status == '[ACCEPTED]')
              <div class="card-header ">
                <strong>{{ $data->date_of_leave }} (Accepted)</strong>
                <i class="float-right" style="font-size:85%;">Request sent on :- {{ $data->date_of_request }}</i>
              </div>
            @elseif($data->approval_status == '[DECLINED]')
              <div class="card-header">
                <strong>{{ $data->date_of_leave }} (Declined)</strong>
                <i class="float-right" style="font-size:85%;">Request sent on :- {{ $data->date_of_request }}</i>
              </div>
            @endif
            <div class="card-body">
              @foreach($leave_type as $keyy => $object)
             @if($keyy == $data->type_of_leave - 1)
             {{ $object->leave_type_name }}
             @endif
              @endforeach
            </div>
          </div>
      @endforeach
    </div>
</div>
@endsection
<script>
    window.onload = function() {
      $(".nav-item:eq(1)").addClass("active");
      $('.confirmation').on('click', function () {
          return confirm('Are you sure to delete?');
      });
      $('#type_of_leave').val("{{ $filter_options['type_of_leave'] }}");
      $('#year').val("{{ $filter_options['year'] }}");
      $('#month').val("{{ $filter_options['month'] }}");
      $('#status').val("{{ $filter_options['status'] }}");
    };
</script>
