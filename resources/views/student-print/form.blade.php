<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nim') }}
            {{ Form::text('nim', $studentPrint->nim, ['class' => 'form-control' . ($errors->has('nim') ? ' is-invalid' : ''), 'placeholder' => 'Nim']) }}
            {!! $errors->first('nim', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_printed') }}
            {{ Form::text('is_printed', $studentPrint->is_printed, ['class' => 'form-control' . ($errors->has('is_printed') ? ' is-invalid' : ''), 'placeholder' => 'Is Printed']) }}
            {!! $errors->first('is_printed', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>