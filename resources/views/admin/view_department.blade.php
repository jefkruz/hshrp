@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{$department->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row staff-grid-row">
                @foreach($department->projects() as $project)
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
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card project-user">
                        <div class="card-body">
                            <h6 class="card-title m-b-20">Supervisor
                                @if(!$department->leader() && session('admin'))
                                <button type="button" class="float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i> Add</button>
                                @endif
                            </h6>
                            <ul class="list-box">
                                @if($department->leader())
                                <li>
                                    <a href="#">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar"><img alt="" src="{{$department->leader()->profile_pic}}"></span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">{{$department->leader()->fullname}}</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content"><small>Portal ID:</small> {{$department->leader()->portal_id}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card project-user">
                        <div class="card-body">
                            <h6 class="card-title m-b-20">Unit Members</h6>
                            <ul class="list-box">
                                @foreach($department->members() as $member)
                                    <li>
                                        <a href="#">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar"><img alt="" src="{{$member->profile_pic}}"></span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">{{$member->title}} {{$member->firstname}} {{$member->lastname}}</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">{{$member->designation}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @if(session('admin'))
    <div id="assign_leader" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Supervisor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.assignUnitHead', $department->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">New Supervisor</label>
                                    <select name="leader_id" class="form-control" required>
                                        <option value="">Select supervisor</option>
                                        @foreach($department->members() as $mem)
                                            <option value="{{$mem->id}}">{{$mem->title}} {{$mem->firstname}} {{$mem->lastname}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection


@section('style')
@endsection

@section('script')
@endsection
