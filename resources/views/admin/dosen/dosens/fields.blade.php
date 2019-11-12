<!-- Nidn Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nidn', 'Nidn:') !!}
    {!! Form::number('nidn', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Dosen Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name_dosen', 'Name Dosen:') !!}
    {!! Form::text('name_dosen', null, ['class' => 'form-control']) !!}
</div>

<!-- Expertise Field -->
<div class="form-group col-sm-12">
    {!! Form::label('expertise', 'Expertise:') !!}
    {!! Form::text('expertise', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12 ">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.dosen.dosens.index') !!}" class="btn btn-default">Cancel</a>
</div>
