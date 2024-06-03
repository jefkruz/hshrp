@extends('layouts.master')

@section('content')

    @include('partials.breadcrumb')

    <div class="row">
        <div class="col-md-4">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-crosshairs"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{$goal->subject}}</h3>
                        <span><small>Project:</small> {{$goal->project()->title}}</span><br><br>
                        <p><small>Description:</small> {!! $goal->description !!}</p>
                        <p><small>Start Date:</small> {{date("F j, Y", strtotime($goal->start_date))}}</p>
                        <p><small>End Date:</small> {{date("F j, Y", strtotime($goal->end_date))}}</p>

                        @if($goal->status == 'done')
                            <p class="text-purple"><i class="fa fa-check-circle mr-2"></i>Goal Completed</p>
                        @else
                            <p class="text-primary"><i class="fa fa-hourglass-half fa-spin mr-2"></i>Goal In Progress</p>

                            @if($reports->count())
                                <button type="button" class="btn btn-sm btn-purple displayBtn"> Mark goal as completed <i class="fa fa-check"></i><i class="fa fa-check"></i></button>

                                <div id="confirmDisplay" style="display:none" class="mt-3">
                                    Are you sure?
                                    <button type="submit" form="closeGoal" class="btn btn-sm btn-purple"><i class="fa fa-check fa-2x"></i></button>
                                    <button class="btn btn-sm btn-outline-danger displayBtn"><i class="fa fa-times"></i></button>
                                </div>

                                <form id="closeGoal" action="{{route('closeGoal', $goal->id)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card dash-widget">
                <div class="card-body">
                    <div class="dash-widget-info">
                        <h3>Goal Reports</h3>

                        @if($goal->status != 'done')
                        <button data-toggle="modal" data-target="#newReportModal" class="btn btn-purple btn-sm"><i class="fa fa-plus"></i> Add Report</button>
                        @endif

                        <ul class="list-group mt-3">
                            @foreach($reports as $report)
                            <li class="list-group-item">
                                <p class="title">{!! $report->report !!}</p>
                            </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @if($goal->status != 'done')
    <div id="newReportModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
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
                        <input type="hidden" name="goal_id" value="{{$goal->id}}" required>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Type report</label>
                                    <textarea name="report" class="summernote" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection


@section('style')
    <link rel="stylesheet" href="{{url('assets/plugins/summernote/dist/summernote-bs4.css')}}">
@endsection

@section('script')
    <script src="{{url('assets/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script>
        const confirmDisplay = $('#confirmDisplay');
        const displayBtn = $('.displayBtn');

        displayBtn.on('click', function(e){
            e.preventDefault();
            confirmDisplay.toggle(500);
        });
    </script>
@endsection
