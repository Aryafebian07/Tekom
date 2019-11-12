<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Position Field -->
<div class="form-group col-sm-12">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>

<!-- Impression Field -->
<div class='box-body pad form-group {{ $errors->first('misi', 'has-error') }}'>
    {!! Form::label('impression', 'Impression:') !!}
    {!! Form::textarea('impression', NULL, array('placeholder'=>trans('blog/form.ph-content'),'rows'=>'5','class'=>'textarea form-control','style'=>'style="width: 100%; height: 200px !important; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
    <span class="help-block">{{ $errors->first('impression', ':message') }}</span>
</div>

<!-- Image Field -->
<div class="form-group col-sm-12 ">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.testimonial.testimonials.index') !!}" class="btn btn-default">Cancel</a>
</div>
