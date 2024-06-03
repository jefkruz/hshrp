@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if(session('admin'))
                        <div class="col-md-12 mb-3">
                            <button data-toggle="modal" data-target="#newDepartmentModal" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create Unit</button>
                        </div>
                        @endif
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SUB DEPARTMENT</th>
                                    <th>UNIT NAME</th>
                                    <th>SUPERVISOR</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $i => $department)
                                <tr>
                                    <td>{{$i + 1}}</td>
                                    <td>{{$department->subs->name}}</td>
                                    <td>{{$department->name}}</td>
                                    <td>
                                        {{$department->leader()->fullname ?? ''}}
                                    </td>
                                    <td>
                                        <a href="{{route($view_route, $department->id)}}"
                                           class="btn btn-purple btn-sm">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('admin'))
    <div id="newDepartmentModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('createDepartment')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Sub Department</label>
                                    <select  class="form-control" name="sub_id" >
                                        @foreach($subs as $sub)
                                        <option value="{{$sub->id}}">{{$sub->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Unit Name</label>
                                    <input type="text" class="form-control" placeholder="Unit name" name="name" required>
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
    <link rel="stylesheet" href="{{url('assets/css/dataTables.bootstrap4.min.css')}}">
    @endsection

@section('script')
    <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    @endsection
