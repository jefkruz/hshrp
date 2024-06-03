@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')

    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img alt="" src="{{url('assets/images/default-avatar.png')}}"></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">{{$director->title}} {{$director->firstname}} {{$director->lastname}}</h3>
                                        <h6 class="text-muted">{{$director->office}}</h6>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <form class="form" action="{{route('admin.updateDirector')}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Title</label>
                                                    <select name="title" id="" class="form-control">
                                                        <option value="">Select title</option>
                                                        <option selected value="Pastor">Pastor</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">First name</label>
                                                    <input type="text" class="form-control" name="firstname" value="{{$director->firstname}}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Last name</label>
                                                    <input type="text" class="form-control" name="lastname" value="{{$director->lastname}}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Department</label>
                                                    <input type="text" class="form-control" name="office" value="{{$director->office}}" required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="submit-section">
                                                    <button type="submit" class="btn btn-primary submit-btn">Save Detail</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
