@extends('layouts.master')

@section('content')

    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fa fa-graduation-cap"></i> Appraisal For {{$appraisal->staff()}}</h4>
                    <p><i class="fa fa-calendar"></i> <small>Period Appraised:</small> {{$appraisal->period()}}</p>
                    <h4><i class="fa fa-pencil"></i> <small>Appraisal Score:</small> <span class="text-purple">{{$total}}%</span></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3"></div>
                        <div class="col-md-12 mb-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ATTRIBUTE</th>
                                    <th>DESCRIPTION</th>
                                    <th>SCORE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(explode(",", $appraisal->scores) as $i => $val)
                                    <tr>
                                        <td>{{$appraisal_attributes[$i]->attribute}}</td>
                                        <td>{{$appraisal_attributes[$i]->description}}</td>
                                        <td>{{$val}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if($appraisal->comment)
                        <div class="col-md-12">
                            <div class="alert alert-primary">
                                @if($appraisal->from_director == 'yes')
                                <h4><i class="fa fa-comment"></i> Director's Comment</h4>
                                    @else
                                <h4><i class="fa fa-comment"></i> Supervisor's Comment</h4>
                                    @endif
                                {{$appraisal->comment}}
                            </div>
                        </div>
                            @endif
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
