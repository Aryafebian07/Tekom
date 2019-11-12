@extends('admin/layouts/default')

@section('title')
Testimonials
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('vendors/summernote/css/summernote-bs4.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/pages/blog.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pages/wizard.css') }}" rel="stylesheet">
@stop
<!--end of page level css-->

@section('content')
  @include('common.errors')
    <section class="content-header">
     <h1>Testimonials Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                 Dashboard
             </a>
         </li>
         <li>Testimonials</li>
         <li class="active">Edit Testimonial </li>
     </ol>
    </section>
    <section class="content pr-3 pl-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header bg-primary text-white">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Edit  Testimonial
                        </h4></div>
                    <br />
                <div class="card-body">
                {!! Form::model($testimonial, ['route' => ['admin.testimonial.testimonials.update', collect($testimonial)->first() ], 'method' => 'patch','files'=>true]) !!}]) !!}

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
                        <div class="form-group {{ $errors->first('image', 'has-error') }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                @if($testimonial->image)
                                                        <img src="{{URL::to('uploads/testimonials/'.$testimonial->image)}}" alt="img" class="img-responsive"/>
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
                        <a href="{!! route('admin.testimonial.testimonials.index') !!}" class="btn btn-default">Cancel</a>
                    </div>

                {!! Form::close() !!}
                </div>
              </div>
           </div>
    </div>
   </section>
 @stop
@section('footer_scripts')

<script src="{{ asset('vendors/summernote/js/summernote-bs4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript" ></script>
<script type="text/javascript" src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
<script src="{{ asset('js/pages/add_newblog.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
<script src="{{ asset('vendors/moment/js/moment.min.js') }}" ></script>
<script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
<script src="{{ asset('vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/edituser.js') }}"></script>

<script>
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
</script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function() {
                $('input[type=submit]').attr('disabled', 'disabled');
                return true;
            });
        });
    </script>
@stop
