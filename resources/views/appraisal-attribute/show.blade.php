@extends('layouts.app')

@section('template_title')
    {{ $appraisalAttribute->name ?? "{{ __('Show') Appraisal Attribute" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Appraisal Attribute</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('appraisal-attributes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Attribute:</strong>
                            {{ $appraisalAttribute->attribute }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $appraisalAttribute->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
