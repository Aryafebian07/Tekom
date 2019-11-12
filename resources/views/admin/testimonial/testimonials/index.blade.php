@extends('admin/layouts/default')

@section('title')
Testimonials
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Testimonials</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Testimonials</li>
        <li class="active">Testimonials List</li>
    </ol>
</section>

<section class="content pr-3 pl-3">
        <div class="row">
         <div class="col-12">
         @include('flash::message')
         <div class="card ">
                <div class="card-header bg-primary text-white clearfix">
                <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Testimonials List
                </h4>
                <div class="float-right">
                    <a href="{{ route('admin.testimonial.testimonials.create') }}" class="btn btn-sm btn-default"><span class="fa fa-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="card-body table-responsive">
                 @include('admin.testimonial.testimonials.table')

            </div>
        </div>
        </div>
 </div>
</section>
@stop
