@extends('admin-dashboard-layout.dashboard-template')
@section('dashboard-admin-content')

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div id="errorBox" class="alert alert-danger col-md-12 alert-dismissible fade show" role="alert" style="text-align:center;margin-top:20px;">
            <strong style="color:white;">{!! $error !!}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if(session()->has('message'))
    <div id="successBox" class="alert alert-success col-md-12 alert-dismissible fade show" role="alert" style="text-align:center;margin-top:20px;">
        <strong>{{ session()->get('message') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <h3 class="panel-title" style="text-align:center;">Search Filter</h3>
        <form action="/filter-search-leave-history-controller" method="POST">
            {{ csrf_field() }}
            <div class="form-row">
                <!-- Staff -->
                <div class="col-md-4 mb-3">
                    <label for="staff_id">Select Staff</label>
                    <select class="form-control" name="staff_id" id="staff_id" required>
                        <option value="" disabled selected>Select a staff</option>
                        @foreach ($staff_basic_data as $data)
                            <option value="{{ $data->staff_id }}">{{ $data->staff_id }} ({{ $data->firstname }} {{ $data->lastname }})</option>
                        @endforeach
                    </select>
                </div>
                <!-- Type of Leave -->
                <div class="col-md-4 mb-3">
                    <label for="type_of_leave">Type of Leave</label>
                    <select class="form-control" name="type_of_leave" id="type_of_leave" required>
                        @foreach($leave_type as $type)
                            <option value="{{ $type->id }}">{{ $type->leave_type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Year -->
                <div class="col-md-4 mb-3">
                    <label for="year">Year</label>
                    <select class="form-control" name="year" id="year" required>
                        <option value="All" selected>All</option>
                        @for ($year = 2021; $year <= 2121; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <button class="btn btn-primary float-right" type="submit">Search</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    window.onload = function() {
        $(".nav-item:eq(2)").addClass("active");
        $(".alert").delay(3000).fadeOut("slow");
    }
</script>
@endpush

@endsection
