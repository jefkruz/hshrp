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
                                <a href="#"><img alt="" src="{{$member_data['member']->profile_pic}}"></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">{{$member_data['member']->title}} {{$member_data['member']->firstname}} {{$member_data['member']->lastname}}</h3>
{{--                                        <h6 class="text-muted">{{$department->name}} @if($is_leader)<span class="text-danger">:: UNIT HEAD</span>@endif</h6>--}}
                                        <small class="text-muted">{{$member_data['member']->designation}}</small>
                                        <div class="staff-id">Portal ID : {{$member_data['member']->portal_id}}</div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Email:</div>
                                            <div class="text">{{$member_data['member']->email}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Marital Status:</div>
                                            <div class="text">{{$member_data['member']->marital_status}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Nationality:</div>
                                            <div class="text">{{$member_data['member']->nationality}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Gender:</div>
                                            <div class="text">{{$member_data['member']->gender}}</div>
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

    <div class="card tab-box">
        <div class="row user-tabs">
            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link active">Projects Assigned</a></li>
                    <li class="nav-item"><a href="#emp_goals" data-toggle="tab" class="nav-link">Goals and Reports</a></li>
                    <li class="nav-item"><a href="#emp_appraisals" data-toggle="tab" class="nav-link">Appraisals</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade active show" id="emp_projects">
            <div class="row">
                @foreach($member_data['projects'] as $project)
                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown dropdown-action profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <h4 class="project-title"><a href="#">{{$project->title}}</a></h4>
                                <p class="text-muted">
                                    {!! $project->description !!}
                                </p>
                                <div class="project-members m-b-15">
                                    <div>Project Leader :</div>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="" data-original-title="{{$project->leader()->title}} {{$project->leader()->firstname}} {{$project->leader()->lastname}}"><img alt="" src="{{$project->leader()->profile_pic}}"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-members m-b-15">
                                    <div>Team :</div>
                                    <ul class="team-members">
                                        @foreach($project->team() as $member)
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="{{$member->title}} {{$member->firstname}} {{$member->lastname}}"><img alt="" src="{{$member->profile_pic}}"></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="emp_goals">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table datatable table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Project</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($member_data['goals'] as $i => $goal)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td>{{$goal->subject}}</td>
                                        <td>{{$goal->project()->title}}</td>
                                        <td>{{date("F j, Y", strtotime($goal->start_date))}}</td>
                                        <td>{{date("F j, Y", strtotime($goal->end_date))}}</td>
                                        <td>{!! Str::limit($goal->description) !!}</td>
                                        <td>
                                            @if($goal->status == 'done')
                                                <button class="btn btn-rounded btn-white btn-sm"><i class="fa fa-check-circle text-success"></i> DONE</button>
                                            @else
                                                <button class="btn btn-rounded btn-white btn-sm"><i class="fa fa-hourglass-o fa-spin"></i> IN PROGRESS</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{route('viewGoal', $goal->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_goal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="emp_appraisals">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4>Appraisals</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if($canAppraise)
                                <div class="col-md-12 mb-3">
                                    <button data-toggle="modal" data-target="#appraisalModal" class="btn btn-purple btn-sm"><i class="fa fa-scroll"></i> Appraise Staff</button>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($appraisals as $app)
                                            <div class="col-md-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{route('viewAppraisal', $app->id)}}" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="">Appraisal - {{$app->period()}}</a></h6>
                                                        <span>Appraised by: {{$app->appraiserName()}}</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="d-none d-sm-inline">Date Appraised: </span>{{date("F j, Y", strtotime($app->created_at))}}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($canAppraise)
    <div id="appraisalModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Give Performance Appraisal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('submitAppraisal')}}">
                        @csrf

                        <input type="hidden" name="staff_id" value="{{$member_data['member']->id}}" required>
                        <input type="hidden" name="from_director" value="no" required>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Select Month and Year</label>
                                    <div class="cal-icon">
                                        <input type="text" placeholder="Enter appraisal period" class="form-control datepick" name="period" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <ul class="list-group">
                                    @foreach($appraisal_attributes as $attr)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h4>{{$attr->attribute}}</h4>
                                                <p>{{$attr->description}}</p>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Score</label>
                                                    <input type="number" min="0" max="10" class="form-control" name="score[]" required>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Supervisor's Comment</label>
                                    <textarea name="comment" rows="10" class="form-control" placeholder="Enter additional comment here..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit Appraisal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endsection

@section('style')
    <link rel="stylesheet" href="{{url('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}">
@endsection

@section('script')
    <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('assets/js/moment.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script>
        $('.datepick').datetimepicker({
            format: 'YYYY-MM',
            maxDate: new Date(),
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            }
        });
    </script>
@endsection
