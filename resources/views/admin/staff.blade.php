@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if(session('admin'))
                        <div class="col-md-12 mb-3">
                            <button data-toggle="modal" data-target="#newDepartmentModal" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Staff</button>
                        </div>
                        @endif
                        <div class="col-md-12 table-responsive">
                            <table class="table datatable table-striped datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>PORTAL ID</th>
                                    <th>UNIT</th>
                                    <th>DESIGNATION</th>
                                    <th>EMAIL</th>
                                    <th>GENDER</th>
                                    <th>NATIONALITY</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($staff as $i => $item)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td><a href="{{route($view_route, $item->id)}}">{{$item->title}} {{$item->firstname}} {{$item->lastname}} @if($item->is_leader == 'yes')<small class="text-danger"> :: SUPERVISOR</small>@endif</a></td>
                                        <td>{{$item->portal_id}}</td>
                                        <td>{{$item->department()->name}}</td>
                                        <td>{{$item->designation}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->gender}}</td>
                                        <td>{{$item->nationality}}</td>
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
                    <h5 class="modal-title">Add Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Portal ID</label>
                                    <input type="text" class="form-control" name="portal_id" placeholder="Portal ID" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Firstname</label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Lastname</label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Unit</label>
                                    <select name="department_id" class="form-control" required>
                                        <option value="">--Select unit--</option>
                                        @foreach($departments as $dept)
                                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                                            @endforeach
                                    </select>
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
