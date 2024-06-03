@extends('layouts.admin')

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
                        <span><small>Staff:</small> {{$goal->reporter()->title}} {{$goal->reporter()->firstname}} {{$goal->reporter()->lastname}}</span><br><br>
                        <p><small>Description:</small> {!! $goal->description !!}</p>
                        <p><small>Start Date:</small> {{date("F j, Y", strtotime($goal->start_date))}}</p>
                        <p><small>End Date:</small> {{date("F j, Y", strtotime($goal->end_date))}}</p>

                        @if($goal->status == 'done')
                            <p class="text-purple"><i class="fa fa-check-circle mr-2"></i>Goal Completed</p>
                        @else
                            <p class="text-primary"><i class="fa fa-hourglass-half fa-spin mr-2"></i>Goal In Progress</p>
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




@endsection


@section('style')
@endsection

@section('script')
@endsection
