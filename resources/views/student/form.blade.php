<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nim') }}
            {{ Form::text('nim', $student->nim, ['class' => 'form-control' . ($errors->has('nim') ? ' is-invalid' : ''), 'placeholder' => 'Nim']) }}
            {!! $errors->first('nim', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nama') }}
            {{ Form::text('nama', $student->nama, ['class' => 'form-control' . ($errors->has('nama') ? ' is-invalid' : ''), 'placeholder' => 'Nama']) }}
            {!! $errors->first('nama', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tugas/quiz') }}
            {{ Form::text('tugasQuiz', $student->tugasQuiz, ['class' => 'form-control' . ($errors->has('tugasQuiz') ? ' is-invalid' : ''), 'placeholder' => 'Tugas/Quiz']) }}
            {!! $errors->first('tugasQuiz', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('uts') }}
            {{ Form::text('uts', $student->uts, ['class' => 'form-control' . ($errors->has('uts') ? ' is-invalid' : ''), 'placeholder' => 'Uts']) }}
            {!! $errors->first('uts', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('uas') }}
            {{ Form::text('uas', $student->uas, ['class' => 'form-control' . ($errors->has('uas') ? ' is-invalid' : ''), 'placeholder' => 'Uas']) }}
            {!! $errors->first('uas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nilai') }}
            {{ Form::text('nilai', $student->nilai, ['class' => 'form-control' . ($errors->has('nilai') ? ' is-invalid' : ''), 'placeholder' => 'Nilai']) }}
            {!! $errors->first('nilai', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nilaiAngka') }}
            {{ Form::text('nilaiAngka', $student->nilaiAngka, ['class' => 'form-control' . ($errors->has('nilaiAngka') ? ' is-invalid' : ''), 'placeholder' => 'Nilaiangka']) }}
            {!! $errors->first('nilaiAngka', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nilaiHuruf') }}
            {{ Form::text('nilaiHuruf', $student->nilaiHuruf, ['class' => 'form-control' . ($errors->has('nilaiHuruf') ? ' is-invalid' : ''), 'placeholder' => 'Nilaihuruf']) }}
            {!! $errors->first('nilaiHuruf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('keterangan') }}
            {{ Form::text('keterangan', $student->keterangan, ['class' => 'form-control' . ($errors->has('keterangan') ? ' is-invalid' : ''), 'placeholder' => 'Keterangan']) }}
            {!! $errors->first('keterangan', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('namaMK') }}
            {{ Form::text('namaMK', $student->namaMK, ['class' => 'form-control' . ($errors->has('namaMK') ? ' is-invalid' : ''), 'placeholder' => 'Namamk']) }}
            {!! $errors->first('namaMK', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('kelas') }}
            {{ Form::text('kelas', $student->kelas, ['class' => 'form-control' . ($errors->has('kelas') ? ' is-invalid' : ''), 'placeholder' => 'Kelas']) }}
            {!! $errors->first('kelas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('statusPembayaran') }}
            {{ Form::text('statusPembayaran', $student->statusPembayaran, ['class' => 'form-control' . ($errors->has('statusPembayaran') ? ' is-invalid' : ''), 'placeholder' => 'Statuspembayaran']) }}
            {!! $errors->first('statusPembayaran', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>