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
                            <table  id="example1" class="table  table-striped ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>KC USERNAME</th>
                                    <th>UNIT</th>
                                    <th>PHONE</th>
                                    <th>EMAIL</th>
                                    <th>ACTIONS</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($staff as $i => $item)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td><a href="{{route($view_route, $item->id)}}">{{$item->title}} {{$item->firstname}} {{$item->lastname}} @if($item->is_leader == 'yes')<small class="text-danger"> :: SUPERVISOR</small>@endif</a></td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->department()->name}}</td>
                                        <td>{{$item->phone ?? ''}}</td>
                                        <td>{{$item->email ?? ''}}</td>
                                        <td>

                                            <form action="{{ route('admin.staffDelete',$item->id) }}" method="POST" onsubmit="return confirm('Are You sure you want to delete')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
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
                                    <label for="">KingsChat Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="KC Username    " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <select class="form-control select "  required name="title" >
                                        <option value="" >--Select--</option>
                                        <option value="Brother" >Brother</option>
                                        <option value="Sister" >Sister</option>
                                        <option value="Pastor" >Pastor</option>
                                        <option value="Deacon" >Deacon</option>
                                        <option value="Deaconess" >Deaconess</option>
                                        <option value="Evangelist" >Evangelist</option>
                                        <option value="Reverend" >Reverend</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Official Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Official Email" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Unit</label>
                                    <select name="department_id" class=" select form-control" required>
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
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- DataTables  & Plugins -->

    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": [ "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection

