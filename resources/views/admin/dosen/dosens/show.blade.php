@extends('admin/layouts/default')

@section('title')
Dosen
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Dosen View</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Dosens</li>
        <li class="active">Dosen View</li>
    </ol>
</section>

<section class="content pr-3 pl-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header bg-primary text-white">
                    <h4 class="card-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Dosen details
                    </h4>
                </div>
                    <div class="card-body">
                        @include('admin.dosen.dosens.show_fields')
                    </div>
                </div>

    <div class="form-group">
           <a href="{!! route('admin.dosen.dosens.index') !!}" class="btn btn-warning mt-2">Back</a>
    </div>
     </div>
  </div>
</section>
@stop
