@extends('admin/layouts/default')

@section('title')
HeaderCarousel
@parent
@stop

@section('content')
@include('common.errors')
<section class="content-header">
    <h1>HeaderCarousel</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>HeaderCarousels</li>
        <li class="active">Create HeaderCarousel </li>
    </ol>
</section>
<section class="content pr-3 pl-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header bg-primary text-white">
                <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Create New  HeaderCarousel
                </h4></div>
            <br />
            <div class="card-body">
            {!! Form::open(array('url' => URL::to('admin/headerCarousel/headerCarousels'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
            {{-- {!! Form::open(['route' => 'admin.headerCarousel.headerCarousels.store']) !!} --}}

                @include('admin.headerCarousel.headerCarousels.fields')

            {!! Form::close() !!}
        </div>
      </div>
      </div>
 </div>
</section>
 @stop
@section('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function() {
                $('input[type=submit]').attr('disabled', 'disabled');
                return true;
            });
        });
    </script>
@stop
