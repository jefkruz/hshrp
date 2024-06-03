@extends('layouts.admin')

@section('template_title')
    {{ $subDepartment->name ?? "{{ __('Show') Sub Department" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Sub Department</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sub-departments.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $subDepartment->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
