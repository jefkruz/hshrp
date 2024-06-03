@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')

    <!-- Search Filter -->
    <div class="row filter-row mb-4">
        <div class="col-sm-6 col-md-8">
            <div class="form-group form-focus">
                <input class="form-control floating" type="text">
                <label class="focus-label">Staff</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="form-group form-focus select-focus">
                <select class="select floating">
                    <option>Select Unit</option>
                    @foreach($units as $unit)
                    <option>{{$unit->name}}</option>
                    @endforeach

                </select>
                <label class="focus-label">Unit</label>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <!-- /Search Filter -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Unit</th>
                        <th>Email</th>
                        <th>Designation</th>

                        <th class="text-center">View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile.html" class="avatar"><img alt="" src="{{$staff->profile_pic}}"></a>
                                <a href="profile.html" class="text-primary">{{$staff->title}} {{$staff->firstname}}{{$staff->lastname}} <span>{{$staff->portal_id}}</span></a>
                            </h2>
                        </td>
                        <td>{{$staff->dept->name}}</td>
                        <td class="text-info">{{$staff->email}}</td>
                        <td>{{$staff->designation}}</td>


                        <td><a href="{{route('admin.viewReport',$staff->id)}}" class="btn btn-outline-success btn-sm">View</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection


@section('style')
    <link rel="stylesheet" href="{{url('assets/plugins/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/select2.min.css')}}">


@endsection

@section('script')
    <script src="{{url('assets/js/select2.min.js')}}"></script>
    <script src="{{url('assets/js/moment.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
@endsection
