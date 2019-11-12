@extends('admin/layouts/default')

@section('title')
GalleryPhotos
@parent
@stop
@section('content')
  @include('common.errors')
    <section class="content-header">
     <h1>GalleryPhotos Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                 Dashboard
             </a>
         </li>
         <li>GalleryPhotos</li>
         <li class="active">Edit GalleryPhoto </li>
     </ol>
    </section>
    <section class="content pr-3 pl-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header bg-primary text-white">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Edit  GalleryPhoto
                        </h4></div>
                    <br />
                <div class="card-body">
                {!! Form::model($galleryPhoto, ['route' => ['admin.gallery.galleryPhotos.update', collect($galleryPhoto)->first() ], 'method' => 'patch']) !!}

                @include('admin.gallery.galleryPhotos.fields')

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
