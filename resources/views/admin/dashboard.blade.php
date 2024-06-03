@extends('layouts.admin')

@section('content')
    @include('partials.breadcrumb')

    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="card dash-widget">
                <a href="{{route('admin.subDepartments')}}">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-building-user"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{$cards['sub_departments']}}</h3>
                            <span>Sub Departments</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="card dash-widget">
                <a href="{{route('admin.departments')}}">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-building-user"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{$cards['departments']}}</h3>
                        <span>Units</span>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="card dash-widget">
                <a href="{{route('admin.staff')}}">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{$cards['staff']}}</h3>
                        <span>Staff</span>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="card dash-widget">
                <a href="{{route('admin.projects')}}">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-rocket"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{$cards['projects']}}</h3>
                        <span>Projects</span>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="card dash-widget">
                <a href="{{route('admin.report')}}">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-file-word"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{$cards['reports']}}</h3>
                        <span>Grade Reports</span>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="card dash-widget">
                <a href="{{route('admin.appraisal')}}">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-graduation-cap"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{$cards['appraisals']}}</h3>
                        <span>Appraisal Attributes</span>
                    </div>
                </div>
                </a>
            </div>
        </div>

    </div>
    @endsection
