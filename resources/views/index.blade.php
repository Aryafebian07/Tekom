@extends('layouts/default')

{{-- Page title --}}
@section('title')
Home
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css starts-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/tabbular.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/animate/animate.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/jquery.circliful.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl_carousel/css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl_carousel/css/owl.theme.css') }}">
{{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" /> --}}
<style>
    .box{
        margin-top:53px !important;
    }
    #focus{
        margin-top: 30px !important;
    }
    #dsn-carousel .item {
        margin: 5px !important;
    }
    #fcs-carousel .item {
        margin: 5px;
    }
    #nial-carousel .item {
        margin: 5px;
    }
    #carousel .item {
        margin: 5px;
    }
    /* #map{
        position: absolute;top:0;bottom:0;left:0;right:0;
    } */
</style>

<!--end of page level css-->
@stop

{{-- slider --}}
@section('top')
<!--Carousel Start -->
<div id="owl-demo" class="owl-carousel owl-theme">
    @foreach ($headerCarousels as $headerCarousel)
    <div class="item img-fluid"><img src="{{URL::to('uploads/files/headercarousel/'.$headerCarousel->filename)}}" alt="slider-image"/>
    </div>
    @endforeach
</div>
<!-- //Carousel End -->
@stop

{{-- content --}}
@section('content')
<!-- Focus Section Start-->
<section class="feature-main1">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 my-3">
                <h3 class="border-warning"><span class="heading_border bg-warning mx-auto">Graduate</span></h3>
            </div>
        </div>
    <div class="row" id="focus">
            <div class="col-12 my-4">
                <div class="owl-carousel owl-theme" id="fcs-carousel">
                    @foreach($foci as $focus)
                    <div class="item">
                        <div class="box">
                            <div class="box-icon box-icon2">
                                <i class="livicon icon1" data-name="{!! $focus->icon !!}" data-size="55" data-loop="true" data-c="#f89a14"
                                   data-hc="#f89a14"></i>
                            </div>
                            <div class="info">
                                <h3 class="warning text-center">{!! $focus->name_focus !!}</h3>
                                <p>{!! $focus->desc !!}</p>
                                {{-- <div class="text-right primary"><a href="#">Read more</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Section Start -->
<section class="feature-main">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 my-3">
                <h3 class="border-warning"><span class="heading_border bg-warning mx-auto">News</span></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 worlnews">
                    <div class="owl-carousel owl-theme" id="carousel">
                        @foreach($blogs as $blog)
                            <div class="item">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img src="{{ URL::to('/uploads/blog/'.$blog->image)  }}" class="img-fluid" alt="image">
                                    </div>
                                    <div class="col-sm-6">
                                        <h2 class="media-heading ">{{ $blog->title }}</h2>
                                        <p>
                                            <strong>Tags: </strong>
                                            @forelse($blog->tags as $tag)
                                                <a href="{{ URL::to('news/'.mb_strtolower($tag).'/tag') }}">{{ $tag }}</a>,
                                            @empty
                                                No Tags
                                            @endforelse
                                        </p>
                                        <p class="additional-post-wrap">
                                            <span class="additional-post">
                                                <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i> by&nbsp;<a href="#">{{$blog->author->first_name . ' ' . $blog->author->last_name}}</a>
                                            </span>
                                            <span class="additional-post">
                                                <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i><a href="#"> {!! date('d-m-Y', strtotime($blog->created_at)) !!}</a>
                                            </span>
                                        </p>
                                        <hr>
                                        <p class="text-right">
                                            <a href="{{ URL::to('newsitem/'.$blog->slug) }}" class="btn btn-primary text-white">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
        </div>
    </div>
</section>
<!-- //News Section Start -->
<!-- Profile Section End -->
<section class="feature-main1">
    <div class="container">
        <div class="row">
            <!-- Profile Start -->
            <div class="text-center col-12 wow flash my-3" data-wow-duration="3s">
                    <h3 class="border-warning"><span class="heading_border bg-warning mx-auto">Profile</span></h3>
            </div>
            <!-- Profile End -->
            @foreach ($prodis as $prodi)
            <div class="col-md-6 col-sm-12  col-lg-6 col-12 wow slideInLeft" data-wow-duration="1.5s">
                <div id="profile">
                    <div class="card mb-2">
                        <div class="card-header p-0" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-minus success"></i>
                                    <span class="success">Visi</span>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#profile">
                            <div class="card-body">
                                <p class="text-justify">
                                    {!! $prodi->visi !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header p-0" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa fa-plus success"></i>
                                    <span class="success">Misi</span>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#profile">
                            <div class="card-body">
                                <p class="text-justify">
                                    {!! $prodi->misi !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header p-0" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa fa-plus success"></i>
                                    <span class="success">Tujuan</span>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#profile">
                            <div class="card-body">
                                <p class="text-justify">
                                    {!! $prodi->tujuan !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-12 col-lg-6 wow slideInRight" data-wow-duration="3s">
                <div class="">
                    <div class="thumbnail" style="width:100%; height:400px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.754684194865!2d106.91037294992667!3d-6.919903369626891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e684829c6dffdd5%3A0xecbbf1784114f3d8!2sPoliteknik%20Sukabumi!5e0!3m2!1sen!2sid!4v1570091783557!5m2!1sen!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--     //Profile Section End -->
<!-- Dosen Start -->
<section class="feature-main">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 my-3">
                <h3 class="border-warning"><span class="heading_border bg-warning mx-auto">Dosen</span></h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12 my-3">
                <div class="owl-carousel owl-theme" id="dsn-carousel">
                    @foreach ($dosens as $dosen)
                    <div class="item">
                            <div class="thumbnail bg-white">
                                @if($dosen->image)
                                    <img src="{{URL::to('uploads/dosens/'.$dosen->image)}}" alt="img" style="width: 240px; height: 240px;" class="img-responsive"/>
                                @else
                                    <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="..." style="width: 240px; height: 240px;" class="img-responsive"/>
                                @endif
                                <div class="caption">
                                    <b>{!!$dosen->name_dosen!!}</b>
                                    <p class="text-center"> {!!$dosen->expertise!!}</p>
                                    {{-- <div class="divide">
                                        <a href="#" class="divider">
                                            <i class="livicon" data-name="facebook" data-size="22" data-loop="true" data-c="#3a5795"
                                            data-hc="#3a5795"></i>
                                        </a>
                                        <a href="#">
                                            <i class="livicon" data-name="twitter" data-size="22" data-loop="true" data-c="#55acee"
                                            data-hc="#55acee"></i>
                                        </a>
                                        <a href="#">
                                            <i class="livicon" data-name="google-plus" data-size="22" data-loop="true" data-c="#d73d32"
                                            data-hc="#d73d32"></i>
                                        </a>
                                        <a href="#">
                                            <i class="livicon" data-name="linkedin" data-size="22" data-loop="true" data-c="#1b86bd"
                                            data-hc="#1b86bd"></i>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Dosen End -->
<!-- Testimonial Start -->
<section class="feature-main1">
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
            <!-- Testimonial Section -->
                <div class="row text-center">
                    <div class="col-12 my-3">
                        <h3 class="border-warning"><span class="heading_border bg-warning mx-auto">Alumni</span></h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 my-3">
                        <div class="owl-carousel owl-theme" id="nial-carousel">
                            @foreach ($testimonials as $nial)
                                <div class="item">
                                    <div class="author">
                                        <img src="{{ asset('images/authors/avatar2.jpg') }}" alt="avatar2"
                                            class="img-fluid rounded-circle float-left">
                                        <p class="text-right">
                                            {!!$nial->name!!}
                                            <br>
                                        <small class="text-right">{!!$nial->position!!}</small>
                                        </p>
                                        <p class="text-justify">
                                            {!!$nial->impression !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial End -->
<!-- Gallery section Start -->
<section class="feature-main">
    <div class="container">
        <div class="row">
            <!-- Gallery Image -->
            <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                <div class="row text-center">
                    <div class="col-12 my-3">
                        <h3 class="border-warning"><span class="heading_border bg-warning mx-auto">Photo Gallery</span></h3>
                    </div>
                </div>
                <div class="text-left">
                    <div class="col-12 my-3">
                        <div class="owl-carousel owl-theme" id="pgal-carousel">
                            @foreach ($galleryphotos as $photo)
                            <div class="item">
                                <div class="thumbnail" href="#">
                                    <img src="{{ URL::to('/uploads/files/gallery/'.$photo->imagename)  }}"  class="img-fluid" id="img-item">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Gallery Image End -->
            <!-- Gallery Video Start -->
            <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                <div class="row text-center">
                    <div class="col-12 my-3">
                        <h3 class="border-warning"><span class="heading_border bg-warning mx-auto">Video Gallery</span></h3>
                    </div>
                </div>
                <div class="text-left">
                    <div class="col-12 my-3">
                        <div class="owl-carousel owl-theme" id="vgal-carousel">
                            @foreach ($videoList as $video)
                                <div class="item">
                                    <div class="thumbnail" href="#">

                                                <iframe width="100%" height="300px" src="https://www.youtube.com/embed/{!!$video->id->videoId!!}" frameborder="0" allowfullscreen></iframe>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- //Gallery Video End -->
        </div>
    </div>
</section>
<!-- //Gallery End -->
 <!-- //Container End -->
 {{-- <div class="modal fade" role="dialog" id="img-zoom">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src='' id="img-item-zoom" height="100%" width="100%">
                </div>
            </div>
        </div>
    </div> --}}

@stop
{{-- footer scripts --}}
@section('footer_scripts')
<!-- page level js starts-->
<script type="text/javascript" src="{{ asset('js/frontend/jquery.circliful.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/wow/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/index.js') }}"></script>
<!--page level js ends-->
<script src="{{ asset('vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('vendors/jquery_newsTicker/js/jquery.newsTicker.js') }}" type="text/javascript"></script>
<!-- page level js starts-->
{{-- <script src="http://maps.google.com/maps/api/js?libraries=places&key={{ env('GOOGLE_MAPS_API_KEY') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('vendors/gmaps/js/gmaps.min.js') }}" ></script> --}}
{{-- <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script> --}}
<script>
            // var map =L.map('map').setView([-6.91990,106.91275], 16);
            // L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}@2x.png?key=rID6rAPz61Y3XdJ1TqQn',{
            //     attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>'
            // }).addTo(map);
            // var marker = L.marker([-6.91990,106.91275]).addTo(map);
            // marker.on('click', function(e){
            //     map.setView([e.latlng.lat, e.latlng.lng], 16);
            // });
    //$(document).ready(function() {
        // var map = new GMaps({
        //     el: '#map',
        //     lat: -6.9201896,
        //     lng: 106.9146571,
        // });
        // map.addMarker({
        //     lat: -6.9201896,
        //     lng: 106.9146571,
        //     title: 'Politeknik Sukabumi'
        // });

    //});

    // $('#img-item').on('click',function(){
    //     var src=$(this).attr('src');
    //     $('#img-item-zoom').attr('src',src);
    //     $("#img-zoom").modal('show');
    // });

    $('.newsticker').newsTicker({
            direction: 'down',
            row_height: 85,
            max_rows: 3,
            duration: 2000
        });
        var owl = $('#carousel');
        owl.owlCarousel({
            autoPlay: 2000, //Set AutoPlay to 3 seconds
            items: 1,
            loop: true,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
        });
        $('#dsn-carousel').owlCarousel({
            center:true,
            items:4,
            loop:true,
            margin:10,
            autoPlay:true,
            autoplayTimeout:1000,
            pagination:false,
        });
        $('#nial-carousel').owlCarousel({
            center:true,
            items:3,
            loop:true,
            margin:10,
            autoPlay:true,
            autoplayTimeout:1000,
            pagination:false,
        });
        $('#fcs-carousel').owlCarousel({
            center:true,
            items:2,
            loop:true,
            margin:10,
            autoPlay:true,
            autoplayTimeout:1000,
            pagination:false,
        });
        $('#vgal-carousel').owlCarousel({
            center:true,
            items:1,
            loop:true,
            autoPlay:false,
            pagination:true,
        });
        $('#pgal-carousel').owlCarousel({
            center:true,
            items:1,
            loop:true,
            autoPlay:true,
            autoplayTimeout:500,
            pagination:false,
        });
</script>
@stop


