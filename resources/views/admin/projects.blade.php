@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')

    <div class="row">
        @foreach($projects as $project)
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
                        <h5 class="project-title"><a href="{{route('admin.view_department', $project->department()->id)}}"><i class="fa fa-building"></i> {{$project->department()->name}}</a></h5>
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



@endsection


@section('style')
@endsection

@section('script')
@endsection
