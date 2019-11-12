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
HeaderCarousels
@parent
@stop
@section('content')
  @include('common.errors')
    <section class="content-header">
     <h1>HeaderCarousels Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                 Dashboard
             </a>
         </li>
         <li>HeaderCarousels</li>
         <li class="active">Edit HeaderCarousel </li>
     </ol>
    </section>
    <section class="content pr-3 pl-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header bg-primary text-white">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Edit  HeaderCarousel
                        </h4></div>
                    <br />
                <div class="card-body">
                    {!! Form::model($headerCarousel, ['route' => ['admin.headerCarousel.headerCarousels.update', collect($headerCarousel)->first() ], 'method' => 'patch','files'=>true]) !!}
                    {{-- @include('admin.headerCarousel.headerCarousels.fields') --}}
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
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input id="pic" name="filename" type="file"
                                                    class="form-control"/>
                                            </span>
                                            <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput" style="color: black !important;">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block">{{ $errors->first('filename', ':message') }}</span>
                            </div>
                        </div>
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
