<!-- Prodi Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('prodi_id', 'Prodi Id:') !!}
    {!! Form::select('prodi_id',$prodi ,null, array('class' => 'form-control select2', 'id'=>'name_prodi' )) !!}
                            <span class="help-block">{{ $errors->first('blog_category_id', ':message') }}</span>
</div>

<!-- Name Focus Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name_focus', 'Name Focus:') !!}
    {!! Form::text('name_focus', null, ['class' => 'form-control']) !!}
</div>

<!-- Icon Field -->
<div class="form-group col-sm-12">
    {!! Form::label('icon', 'Icon:') !!}
    {!! Form::text('icon', null, ['class' => 'form-control']) !!}
</div>

<!-- Icon Color Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::label('icon_color', 'Icon Color:') !!}
    {!! Form::text('icon_color', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', 'Desc:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.fokus.foci.index') !!}" class="btn btn-default">Cancel</a>
</div>
