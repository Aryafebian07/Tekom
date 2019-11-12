@extends('admin/layouts/default')

@section('title')
Prodis
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
    <link href="{{ asset('css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Prodis</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Prodis</li>
        <li class="active">Prodis List</li>
    </ol>
</section>

<section class="content pr-3 pl-3">
    <div class="row">
     <div class="col-12">
     @include('flash::message')
     <div class="card ">
            <div class="card-header bg-primary text-white clearfix">
                <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Prodis List
                </h4>
                <div class="float-right">
                    <a href="{{ route('admin.prodi.prodis.create') }}" class="btn btn-sm btn-default"><span class="fa fa-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="card-body table-responsive">
                 @include('admin.prodi.prodis.table')

            </div>
        </div>
        </div>
 </div>
</section>
@stop
