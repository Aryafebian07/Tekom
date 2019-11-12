@extends('admin/layouts/default')
{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pages/wizard.css') }}" rel="stylesheet">
@stop
<!--end of page level css-->
@section('title')
Dosens
@parent
@stop
@section('content')
  @include('common.errors')
    <section class="content-header">
     <h1>Dosens Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                 Dashboard
             </a>
         </li>
         <li>Dosens</li>
         <li class="active">Edit Dosen </li>
     </ol>
    </section>
    <section class="content pr-3 pl-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header bg-primary text-white">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Edit  Dosen
                        </h4></div>
                    <br />
                <div class="card-body">
                {!! Form::model($dosen, ['route' => ['admin.dosen.dosens.update', collect($dosen)->first() ], 'method' => 'patch','files'=>true]) !!}
                {{-- {!! Form::model($dosen, ['url' => URL::to('admin/dosen/dosens/update' . $dosen->id), 'method' => 'put', 'class' => 'bf', 'files'=> true]) !!} --}}
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
                        <div class="form-group {{ $errors->first('image', 'has-error') }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                @if($dosen->image)
                                                        <img src="{{URL::to('uploads/dosens/'.$dosen->image)}}" alt="img" class="img-responsive"/>
                                                @else
                                                    <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="..." class="img-responsive"/>
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                            <div>
                                        <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                            <input id="pic" name="image" type="file"
                                                   class="form-control"/>
                                        </span>
                                                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput" style="color: black !important;">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="help-block">{{ $errors->first('image', ':message') }}</span>
                                </div>
                            </div>
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12 text-center">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('admin.dosen.dosens.index') !!}" class="btn btn-default">Cancel</a>
                    </div>

                {!! Form::close() !!}
                </div>
              </div>
           </div>
    </div>
   </section>
 @stop
@section('footer_scripts')
    <script src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/edituser.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function() {
                $('input[type=submit]').attr('disabled', 'disabled');
                return true;
            });
        });
    </script>
@stop
