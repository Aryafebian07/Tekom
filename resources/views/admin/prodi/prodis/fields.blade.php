<!-- Name Prodi Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name_prodi', 'Name Prodi:') !!}
    {!! Form::text('name_prodi', null, ['class' => 'form-control']) !!}
</div>

<!-- Visi Field -->
<div class='box-body pad form-group {{ $errors->first('visi', 'has-error') }}'>
    {!! Form::label('visi', 'Visi:') !!}
    {!! Form::textarea('visi', NULL, array('placeholder'=>trans('blog/form.ph-content'),'rows'=>'5','class'=>'textarea form-control','style'=>'style="width: 100%; height: 200px !important; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
    <span class="help-block">{{ $errors->first('visi', ':message') }}</span>
</div>

<!-- Misi Field -->
{{-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('misi', 'Misi:') !!}
    {!! Form::textarea('misi', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div> --}}
<div class='box-body pad form-group {{ $errors->first('misi', 'has-error') }}'>
    {!! Form::label('misi', 'Misi:') !!}
    {!! Form::textarea('misi', NULL, array('placeholder'=>trans('blog/form.ph-content'),'rows'=>'5','class'=>'textarea form-control','style'=>'style="width: 100%; height: 200px !important; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
    <span class="help-block">{{ $errors->first('misi', ':message') }}</span>
</div>

<!-- Visi TUJUAN -->
<div class='box-body pad form-group {{ $errors->first('tujuan', 'has-error') }}'>
    {!! Form::label('tujuan', 'Tujuan:') !!}
    {!! Form::textarea('tujuan', NULL, array('placeholder'=>trans('blog/form.ph-content'),'rows'=>'5','class'=>'textarea form-control','style'=>'style="width: 100%; height: 200px !important; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
    <span class="help-block">{{ $errors->first('tujuan', ':message') }}</span>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.prodi.prodis.index') !!}" class="btn btn-default">Cancel</a>
</div>
