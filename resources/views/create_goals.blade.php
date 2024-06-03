@extends('layouts.master')

@section('content')
    @include('partials.breadcrumb')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
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
                                    <select class="form-control" name="project_id" >
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
