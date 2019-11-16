<!-- Nim Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nim', 'Nim:') !!}
    {!! Form::number('nim', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Judul Field -->
<div class="form-group col-sm-12">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- File Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::label('file', 'File:') !!}
    {!! Form::text('file', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.tugasAkhir.tugasAkhirs.index') !!}" class="btn btn-default">Cancel</a>
</div>
