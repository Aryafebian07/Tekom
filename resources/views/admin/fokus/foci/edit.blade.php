@extends('admin/layouts/default')

@section('title')
Foci
@parent
@stop
@section('content')
  @include('common.errors')
    <section class="content-header">
     <h1>Foci Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                 Dashboard
             </a>
         </li>
         <li>Foci</li>
         <li class="active">Edit Focus </li>
     </ol>
    </section>
    <section class="content pr-3 pl-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header bg-primary text-white">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Edit  Focus
                        </h4></div>
                    <br />
                <div class="card-body">
                {!! Form::model($focus, ['route' => ['admin.fokus.foci.update', collect($focus)->first() ], 'method' => 'patch']) !!}

                @include('admin.fokus.foci.fields')

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
