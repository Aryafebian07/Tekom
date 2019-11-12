{{-- <!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $headerCarousel->id !!}</p>
    <hr>
</div> --}}

<!-- Filename Field -->
<div class="form-group col-sm-12 ">
    {!! Form::label('filename', 'Filename:') !!}
    <div class="form-group {{ $errors->first('filename', 'has-error') }}">
        <div class="row">
            <div class="col-sm-12">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        @if($headerCarousel->filename)
                            <img src="{{URL::to('uploads/files/headercarousel/'.$headerCarousel->filename)}}" alt="img" class="img-responsive"/>
                        @else
                            <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="..." class="img-responsive"/>
                        @endif
                    </div>
            </div>
            <span class="help-block">{{ $errors->first('filename', ':message') }}</span>
        </div>
    </div>
    <hr>
</div>
<!-- Status Field -->
<div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        @if($headerCarousel->status ==1)
           <p>Displayed</p>
        @else
            <p>Not Displayed</p>
        @endif
        <hr>
</div>
