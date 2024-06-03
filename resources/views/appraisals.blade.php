@extends('layouts.master')

@section('content')

    @include('partials.breadcrumb')

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



    <div id="newDepartmentModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('style')
@endsection

@section('script')
@endsection
