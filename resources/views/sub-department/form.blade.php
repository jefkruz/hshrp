<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $subDepartment->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>


            <div class="form-group">
                <label>HOD</label>
                <select class=" select form-control"  required name="hod_id">
                    <option>--Select HOD--</option>
                    @foreach($staffs as $staff)
                    <option value="{{$staff->id}}" >{{ucwords($staff->fullname())}}</option>
                    @endforeach

                </select>
            </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
