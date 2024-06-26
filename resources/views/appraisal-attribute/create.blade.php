@extends('layouts.admin')

@section('template_title')
    {{ __('Create') }} Appraisal Attribute
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Appraisal Attribute</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('appraisal-attributes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('appraisal-attribute.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
