<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $testimonial->id !!}</p>
    <hr>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $testimonial->name !!}</p>
    <hr>
</div>

<!-- Position Field -->
<div class="form-group">
    {!! Form::label('position', 'Position:') !!}
    <p>{!! $testimonial->position !!}</p>
    <hr>
</div>

<!-- Impression Field -->
<div class="form-group">
    {!! Form::label('impression', 'Impression:') !!}
    <p>{!! $testimonial->impression !!}</p>
    <hr>
</div>

<!-- Image Field -->
<div class="form-group">
        {!! Form::label('image', 'Image:') !!}
        {{-- <p>{!! $dosen->image !!}</p> --}}
        <div class="form-group {{ $errors->first('image', 'has-error') }}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                        @if($testimonial->image)
                                <img src="{{URL::to('uploads/testimonials/'.$testimonial->image)}}" alt="img" class="img-responsive"/>
                        @else
                            <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="..." class="img-responsive"/>
                        @endif
                    </div>
                </div>
        </div>
    </div>
