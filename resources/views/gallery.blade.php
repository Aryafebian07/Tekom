@extends('layouts/default')

{{-- Page title --}}
@section('title')
Gallery
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <!-- Add fancyBox main CSS files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/fancybox/css/jquery.fancybox.css') }}"
          media="screen"/>
    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors/fancybox/helpers/css/jquery.fancybox-buttons.css') }}"/>
    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors/fancybox/helpers/css/jquery.fancybox-thumbs.css') }}"/>


    <style>
        #fancybox-thumbs ul li a{

            background-image: url('{{ asset('img/img_holder/gal') }}');
        }
        #fancybox-thumbs ul li img {
            display: block;
            position: relative;
            border: 0;
            padding: 0;
            max-width: none !important; /* ADD THIS LINE*/
        }
    </style>

    <!--page level css end-->
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
        <div class="container">
            <div class="row">
                <div class="col-12">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                    </a>
                </li>
                <li class="d-none d-sm-block">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="{{ route('gallery') }}">Gallery</a>
                </li>
            </ol>
            <div class="float-right mt-1">
                <i class="livicon icon3" data-name="edit" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Gallery
            </div>
        </div>
    </div>
        </div>
    </div>
    @stop


{{-- Page content --}}
@section('content')
    <section class="content pr-3 pl-3">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-12">
                <div class="row">
                    @foreach ($galleryphotos as $photo)
                    <div class="col-lg-2 col-md-2 col-6 col-sm-3 p-2">
                        <a class="fancybox-thumbs" data-fancybox-group="thumb"
                           href="{{ URL::to('/uploads/files/gallery/'.$photo->imagename)  }}">
                            <img src="{{ URL::to('/uploads/files/gallery/'.$photo->imagename)  }}"
                                 class="img-fluid gallery-style" alt="Image">
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- /thumnail helper gallery -->
            </div>
        </div>
        <!-- row-->
    </section>
@stop

@section('footer_scripts')
<script type="text/javascript" src="{{ asset('vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/carousel.js') }}"></script>
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript"
            src="{{ asset('vendors/fancybox/js/jquery.mousewheel.pack.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendors/fancybox/js/jquery.fancybox.pack.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendors/fancybox/helpers/js/jquery.fancybox-buttons.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendors/fancybox/helpers/js/jquery.fancybox-thumbs.js') }}"></script>
    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript"
            src="{{ asset('vendors/fancybox/helpers/js/jquery.fancybox-media.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/jquery_fancy_thumb.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/pages/gallery.js') }}"></script>


<script>
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        e.target // newly activated tab
        e.relatedTarget // previous active tab
        $("#clothing-nav-content .tab-pane").removeClass("show active");
    });
</script>

@stop
