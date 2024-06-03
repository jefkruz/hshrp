@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12 table-responsive">
                            <form method="post" action="{{route('updatePassword')}}">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Old Password</label>
                                            <input type="password" class="form-control"  name="old_password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="password" class="form-control"  name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" class="form-control"  name="password_confirm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection


