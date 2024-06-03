@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="welcome-box">
                <div class="welcome-img">
                    <img alt="" src="{{session('staff')->profile_pic}}">
                </div>
                <div class="welcome-det">
                    <h3>{{$greeting}}, {{session('staff')->title}} {{session('staff')->firstname}} {{session('staff')->lastname}}</h3>
                    <p>{{date('l, jS F Y')}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="dash-sec-title text-primary">Assigned Projects</h1>
                </div>
                @foreach($projects as $project)
                    <div class="col-md-4">
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
            <div class="col-md-12">
                <div class="dash-sidebar">
                    <h5 class="dash-title">Daily Reports</h5>
                    @if(count($statistics_card['pending']))
                        <button data-toggle="modal" data-target="#addReportModal" class="btn btn-purple btn-sm mb-3"><i class="fa fa-plus"></i> Give Report</button>
                    @endif
                    <ul class="list-group">
                        @foreach($statistics_card['reports'] as $report)
                            <li class="list-group-item">
                                <p><small>Project:</small> {{$report->project()->title}}</p>
                                <p><small>Goal:</small> <a href="{{route('viewGoal', $report->goal_id)}}">{{$report->goal()->subject}}</a></p>
                                <span>{!! $report->report !!}</span><br>
                                <small class="text-purple"><i class="fa fa-calendar"></i> {{date("F j, Y", strtotime($report->created_at))}}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="dash-sidebar">
                        <section>
                            <h5 class="dash-title">Statistics</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4>{{$statistics_card['goals']}}</h4>
                                            <p>Total Goals</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>{{count($statistics_card['pending'])}}</h4>
                                            <p>Pending Goals</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <div class="dash-stats-list">
                                            <h4>{{count($statistics_card['reports'])}}</h4>
                                            <p>Reports Submitted</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if(count($statistics_card['pending']))
                            <h1 class="dash-sec-title text-primary">Goals Yet To Be Completed</h1>
                            <button data-toggle="modal" data-target="#addGoalModal" class="btn btn-purple btn-sm mb-3"><i class="fa fa-plus"></i> Add Goal</button>
                            @foreach($statistics_card['pending'] as $goal)
                                <section class="dash-section">
                                    <div class="dash-sec-content">
                                        <div class="dash-info-list">
                                            <a href="{{route('viewGoal', $goal->id)}}" class="dash-card">
                                                <div class="dash-card-container">
                                                    <div class="dash-card-icon">
                                                        <i class="fa fa-hourglass-o fa-spin"></i>
                                                    </div>
                                                    <div class="dash-card-content">
                                                        <p>{{$goal->subject}} <i class="fa fa-arrow-right"></i> <small>{{$goal->project()->title}}</small></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </section>
                            @endforeach
                        @else
                            <h1 class="dash-sec-title text-purple"><i class="fa fa-exclamation-circle"></i> You have no pending goals</h1>
                            <button data-toggle="modal" data-target="#addGoalModal" class="btn btn-purple btn-sm"><i class="fa fa-plus"></i> Add Goal</button>
                        @endif

                    </div>

                </div>
            </div>

        </div>

    </div>



    <div id="addGoalModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Goal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('createGoals')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input class="form-control" type="text" name="subject" required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Project</label>
                                    <select class="form-control" name="project_id" required>
                                        <option value="">Select project</option>
                                        @foreach($projects as $project)
                                            <option value="{{$project->id}}">{{$project->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control summernote" required></textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Start Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="start_date" required>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="end_date" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Add Goal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="addReportModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('addReport')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Select Goal</label>
                                    <select name="goal_id" class="form-control" required>
                                        <option value="">Select goal</option>
                                        @foreach($statistics_card['pending'] as $pend)
                                            <option value="{{$pend->id}}">{{$pend->subject}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Type report</label>
                                    <textarea name="report" class="summernote" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('style')
    <link rel="stylesheet" href="{{url('assets/plugins/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}">
@endsection

@section('script')
    <script src="{{url('assets/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{url('assets/js/moment.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
@endsection
