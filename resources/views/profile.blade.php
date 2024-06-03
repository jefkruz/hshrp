@extends('layouts.master')

@section('content')
    @include('partials.breadcrumb')

    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img alt="" src="{{session('staff')->profile_pic}}"></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">{{session('staff')->title}} {{session('staff')->firstname}} {{session('staff')->lastname}}</h3>
                                        <h6 class="text-muted">{{$department->name}} @if($is_leader)<span class="text-danger">:: SUPERVISOR</span>@endif</h6>
                                        <small class="text-muted">{{session('staff')->designation}}</small>
                                        <div class="staff-id">Portal ID : {{session('staff')->portal_id}}</div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Email:</div>
                                            <div class="text">{{session('staff')->email}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Marital Status:</div>
                                            <div class="text">{{session('staff')->marital_status}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Nationality:</div>
                                            <div class="text">{{session('staff')->nationality}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Gender:</div>
                                            <div class="text">{{session('staff')->gender}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Reports to:</div>
                                            <div class="text">
                                                <div class="avatar-box">
                                                    <div class="avatar avatar-xs">
                                                        <img src="{{$superior->profile_pic}}" alt="">
                                                    </div>
                                                </div>
                                                <a href="#">
                                                    {{$superior->title}} {{$superior->firstname}} {{$superior->lastname}}
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
