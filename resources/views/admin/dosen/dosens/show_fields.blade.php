<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $dosen->id !!}</p>
    <hr>
</div>

<!-- Nidn Field -->
<div class="form-group">
    {!! Form::label('nidn', 'Nidn:') !!}
    <p>{!! $dosen->nidn !!}</p>
    <hr>
</div>

<!-- Name Dosen Field -->
<div class="form-group">
    {!! Form::label('name_dosen', 'Name Dosen:') !!}
    <p>{!! $dosen->name_dosen !!}</p>
    <hr>
</div>

<!-- Expertise Field -->
<div class="form-group">
    {!! Form::label('expertise', 'Expertise:') !!}
    <p>{!! $dosen->expertise !!}</p>
    <hr>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $dosen->email !!}</p>
    <hr>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    {{-- <p>{!! $dosen->image !!}</p> --}}
    <div class="form-group {{ $errors->first('image', 'has-error') }}">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                    @if($dosen->image)
                            <img src="{{URL::to('uploads/dosens/'.$dosen->image)}}" alt="img" class="img-responsive"/>
                    @else
                        <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="..." class="img-responsive"/>
                    @endif
                </div>
            </div>
    </div>
</div>

