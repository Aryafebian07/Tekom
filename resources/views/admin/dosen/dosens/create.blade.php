@extends('admin/layouts/default')
{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('vendors/summernote/css/summernote-bs4.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/pages/blog.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
@stop
<!--end of page level css-->
@section('title')
Dosen
@parent
@stop

@section('content')
@include('common.errors')
<section class="content-header">
    <h1>Dosen</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Dosens</li>
        <li class="active">Create Dosen </li>
    </ol>
</section>
<section class="content pr-3 pl-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header bg-primary text-white">
                <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Create New  Dosen
                </h4></div>
            <br />
            <div class="card-body">
            {!! Form::open(array('url' => URL::to('admin/dosen/dosens'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
            {{-- {!! Form::open(['route' => 'admin.dosen.dosens.store','files'=>true])!!} --}}

                @include('admin.dosen.dosens.fields')

            {!! Form::close() !!}
        </div>
      </div>
      </div>
 </div>
</section>
 @stop
@section('footer_scripts')
    <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function() {
                $('input[type=submit]').attr('disabled', 'disabled');
                return true;
            });
        });
    </script>
@stop
