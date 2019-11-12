<!-- Filename Field -->
<div class="form-group col-sm-12 ">
    {!! Form::label('filename', 'Filename:') !!}
    {!! Form::file('filename', ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['1' => 'Displayed', ' 0' => 'Not Displayed'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.headerCarousel.headerCarousels.index') !!}" class="btn btn-default">Cancel</a>
</div>
