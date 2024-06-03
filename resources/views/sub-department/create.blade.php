@extends('layouts.admin')

@section('template_title')
    {{ __('Create') }} Sub Department
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Sub Department</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sub-departments.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sub-department.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
