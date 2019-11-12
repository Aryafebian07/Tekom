@extends('layouts/default')

{{-- Page title --}}
@section('title')
News
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/blog.css') }}">
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
        <div class="container">
            <div class="row">
                <div class="col-12">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i></a>
                </li>
                <li class="d-none d-sm-block">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="{{ route('news') }}">News</a>
                </li>
            </ol>
            <div class="float-right mt-1">
                <i class="livicon icon3" data-name="edit" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> News
            </div>
        </div>
    </div>
        </div>
    </div>
    @stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Strat -->
    <div class="container blogpage">
        <div class="content">
        <h2 class="my-3">News</h2>
        <div class="row">
                <div class="col-md-8 col-lg-8 col-12 my-2">
                    @forelse ($blogs as $blog)
                    <!-- BEGIN FEATURED POST -->
                    <div class="featured-post-wide thumbnail">
                        @if($blog->image)
                        <img src="{{ URL::to('/uploads/blog/'.$blog->image)  }}" class="img-fluid" alt="Image">
                        @endif
                        <div class="featured-text relative-left">
                            <h3 class="primary"><a href="{{ URL::to('newsitem/'.$blog->slug) }}">{{$blog->title}}</a></h3>
                            {{-- <p>
                                {!! $blog->content !!}
                            </p> --}}
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
                                    <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i><a href="#"> {{$blog->created_at->diffForHumans()}}</a>
                                </span>
                                <span class="additional-post">
                                    <i class="livicon" data-name="comment" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i><a href="#"> {{$blog->comments->count()}} comments</a>
                                </span>
                            </p>
                            <hr>
                            <p class="text-right">
                                <a href="{{ URL::to('newsitem/'.$blog->slug) }}" class="btn btn-primary text-white">Read more</a>
                            </p>
                        </div>
                        <!-- /.featured-text -->
                    </div>
                    <!-- /.featured-post-wide -->
                    <!-- END FEATURED POST -->
                    @empty
                        <h3>No Posts Exists!</h3>
                    @endforelse
                    <ul class="pager">
                        {!! $blogs->render() !!}
                    </ul>
                </div>
                <!-- /.col-md-8 -->
                <div class="ml-auto col-md-4 col-lg-4 col-12">
                        <div class="the-box">
                                <h3 class="small-heading text-center">Recent Posts</h3>
                                <ul class="pl-0">
                                    @foreach ($blogs as $blog)
                                    <li class="media">
                                        <div class="media-body">
                                                <h4 class="media-heading primary">
                                                    <a href="{{ URL::to('newsitem/'.$blog->slug) }}">{{$blog->title}}</a>
                                                </h4>
                                            <p class="date">
                                                <small class="text-danger">{{$blog->created_at->diffForHumans()}}</small>
                                            </p>
                                            {{-- <p class="small">
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo
                                            </p> --}}
                                        </div>
                                    </li>
                                    <hr>
                                    @endforeach
                            </ul>
                        </div>
                    <div class="thumbnail">
                        <h3>Tags</h3>
                        <div class="primary text-center">
                            @forelse($tags as $tag)
                                <a href="{{ URL::to('news/'.$tag.'/tag') }}">{{ $tag }}</a>,
                            @empty
                                No Tags
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- /.col-md-4 -->
            </div>
        </div>
    </div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/carousel.js') }}"></script>
@stop
