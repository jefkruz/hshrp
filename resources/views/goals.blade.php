@extends('layouts.master')

@section('content')
    @include('partials.breadcrumb')

    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{route('createGoalsForm')}}" class="btn btn-rounded btn-primary"><i class="fa fa-plus"></i> Add Goal</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 table-responsive">
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
                    </tr>
                </thead>
                <tbody>
                @foreach($goals as $i => $goal)
                    <tr>
                        <td>{{$i + 1}}</td>
                        <td><a href="{{route('viewGoal', $goal->id)}}">{{$goal->subject}}</a></td>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

@section('style')
    <link rel="stylesheet" href="{{url('assets/css/dataTables.bootstrap4.min.css')}}">
    @endsection

@section('script')
    <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    @endsection
