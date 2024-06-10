@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')


    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        @if(session('admin'))
                            <div class="col-md-12 mb-3">
                                <a href="{{ route('sub-departments.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Sub Department</a>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>HOD</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subs as $i=>$sub)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td>{{$sub->name}}</td>
                                        <td>{{ $sub->hod()->fullname ?? ''}}</td>

                                        <td>
                                            <form action="{{ route('sub-departments.destroy',$sub->id) }}" method="POST">
                                            <a href="{{ route('sub-departments.edit',$sub->id) }}"
                                               class="btn btn-purple   btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
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



    <div id="newAttributeModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Attribute</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Add</button>
                        </div>
                    </form>
                </div>
            </div>
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
