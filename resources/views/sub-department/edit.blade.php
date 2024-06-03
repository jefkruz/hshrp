@extends('layouts.admin')

@section('template_title')
    {{ __('Update') }} Sub Department
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Sub Department</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sub-departments.update', $subDepartment->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('sub-department.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
