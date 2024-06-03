@extends('layouts.master')

@section('content')
    @include('partials.breadcrumb')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('createProject')}}">
                        @csrf
                        <input type="hidden" name="team" id="teamIds" required>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input class="form-control" type="text" name="title" required>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Project Leader</label>
                                    <select class="form-control" name="leader_id" required>
                                        <option value="">Select leader</option>
                                        @foreach($staff as $item)
                                        <option value="{{$item->id}}">{{$item->title}} {{$item->firstname}} {{$item->lastname}}</option>
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
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Add To Team</label>
                                    <div id="team">
                                        <ul class="list-group">
                                            @foreach($staff as $it)
                                            <li class="list-group-item">
                                                {{$it->title}} {{$it->firstname}} {{$it->lastname}}
                                                <button type="button" data-id="{{$it->id}}" data-image="{{$it->profile_pic}}" data-name="{{$it->title}} {{$it->firstname}} {{$it->lastname}}" class="btn btn-outline-primary btn-sm addToTeamBtn">Add To Team <i class="fa fa-arrow-right"></i></button>
                                            </li>
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Team Members</label>
                                    <div class="project-members">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Create Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('style')
    <link rel="stylesheet" href="{{url('assets/plugins/summernote/dist/summernote-bs4.css')}}">
    @endsection


@section('script')
    <script src="{{url('assets/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script>
        const addToTeamBtn = $('.addToTeamBtn');
        const projectMembers = $('.project-members');
        const teamIds = $('#teamIds');

        addToTeamBtn.on('click', function(e){
            e.preventDefault();
            const button = $(this);
            const id = $(this).data('id');
            const name = $(this).data('name');
            const image = $(this).data('image');
            const team = teamIds.val() ? teamIds.val().split(',') : [];
            let isAdded = false;
            team.forEach(t => {
                if(Number(t) === Number(id)){
                    isAdded = true;
                }
            });
            if(isAdded === false){
                team.push(id);
                teamIds.val(team.join(','));

                let avatar = '<a href="#" data-toggle="tooltip" title="" class="avatar" data-original-title="' + name + '">';
                avatar += '<img src="' + image + '" alt="">';
                avatar += '</a>';
                projectMembers.append(avatar);

                button.hide(500);
            }
        });
    </script>
    @endsection
