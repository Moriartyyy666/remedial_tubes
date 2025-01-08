@extends('admin-dashboard-layout.dashboard-template')

@section('dashboard-admin-content')
<div class="card">
    <div class="card-body">
        <h3 class="panel-title text-center">Pending Requests</h3>
        <br>
        @foreach ($pending_data as $key => $data)
            <article class="card mb-3" aria-label="Pending Request for {{$data->firstname}} {{$data->lastname}}">
                <div class="card-header">
                    <strong>{{$data->date_of_leave}} ({{$data->firstname}} {{$data->lastname}})</strong>
                    <i class="float-right small">Request sent on :- {{$data->date_of_request}}</i>
                </div>
                <div class="card-body">
                    @php
                        $leaveTypeName = $leave_type->firstWhere('id', $data->type_of_leave)->leave_type_name ?? 'Unknown';
                    @endphp
                    {{ $leaveTypeName }}
                    <a class="btn btn-danger float-right ml-2" href="{{ route('request.decline', $data->auto_id) }}">Decline</a>
                    <a class="btn btn-primary float-right" href="{{ route('request.accept', $data->auto_id) }}">Accept</a>
                </div>
            </article>
        @endforeach
    </div>
</div>
@endsection
