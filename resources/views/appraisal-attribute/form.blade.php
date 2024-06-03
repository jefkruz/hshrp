<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('attribute') }}
            {{ Form::text('attribute', $appraisalAttribute->attribute, ['class' => 'form-control' . ($errors->has('attribute') ? ' is-invalid' : '')]) }}
            {!! $errors->first('attribute', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::textarea('description', $appraisalAttribute->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
