@extends('layouts.master')

@section('content')

    @include('partials.breadcrumb')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table datatable table-striped datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>PORTAL ID</th>
                                    <th>DESIGNATION</th>
                                    <th>EMAIL</th>
                                    <th>GENDER</th>
                                    <th>NATIONALITY</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($team as $i => $item)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td><a href="{{route('viewTeamMember', $item->id)}}">{{$item->title}} {{$item->firstname}} {{$item->lastname}}</a></td>
                                        <td>{{$item->portal_id}}</td>
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




@endsection

@section('style')
    <link rel="stylesheet" href="{{url('assets/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('script')
    <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/dataTables.bootstrap4.min.js')}}"></script>
@endsection
