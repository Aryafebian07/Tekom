<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <title>
        @section('title')
        | Teknik Komputer
        @show
    </title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/contact.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/lib.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl_carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl_carousel/css/owl.theme.css') }}">
    <style>
      .dropdown-item:active{
            background-color: transparent !important;
        }
      .indexpage.navbar-nav >.nav-item .nav-link:hover {
          color: #01bc8c;
      }

      .posts{
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
  }
  .like-comment{
    font-size: 10px;
    color:#333;
    padding-bottom: 40px;
    font-weight: bold;
  }
  .himtek{
      height: 300px;
      width: 300px;
      box-sizing: border-box;
      overflow: hidden;
  }
  #himtek-carousel .item{
      margin: 5px;
  }
    </style>
    <!--end of global css-
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>

<body>
<!-- Header Start -->
<header>
    <!--Icon Section Start-->
    <div class="icon-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-8 col-md-4 mt-2">
                    <ul class="list-inline">
                        <li>
                            <a href="https://www.facebook.com/polikami/?" target="_blank"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#fff"
                                        data-hc="#757b87"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/himtekpolikami/?" target="_blank"> <i class="livicon" data-name="instagram" data-size="18" data-loop="true"
                                        data-c="#fff" data-hc="#757b87"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#"> <i class="livicon" data-name="google-plus" data-size="18" data-loop="true" data-c="#fff"
                                            data-hc="#757b87"></i>
                            </a>
                        </li>
                        </ul>
                </div>
                <div class="col-lg-8 col-4 col-md-8 text-right mt-2">
                    <ul class="list-inline">
                        <li>
                            <a href="mailto:"><i class="livicon" data-name="mail" data-size="18" data-loop="true"
                                                 data-c="#fff"
                                                 data-hc="#fff"></i></a>
                            <label class="d-none d-md-inline-block d-lg-inline-block d-xl-inline-block"><a
                                    href="mailto:"
                                    class="text-white">tekom@polteksmi.ac.id
                                </a></label>
                        </li>
                        <li>
                            <a href="tel:"><i class="livicon" data-name="phone" data-size="18" data-loop="true"
                                              data-c="#fff"
                                              data-hc="#fff"></i></a>
                            <label class="d-none d-md-inline-block d-lg-inline-block d-xl-inline-block">
                                <a href="tel:" class="text-white">(0266)215417</a></label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container indexpage">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}"
                                                                    alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto  margin_right">
                    <li  class="nav-item {!! (Request::is('/') ? 'active' : '') !!}">
                        <a href="{{ route('home') }}" class="nav-link"> Home</a>
                    </li>
                    {{-- <li class=" nav-item dropdown  {!! (Request::is('typography') || Request::is('advancedfeatures') || Request::is('grid') ? 'active' : '') !!}">
                        <a href="#" aria-expanded="false" class="nav-link"> Features</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('typography') }}" class="dropdown-item">Typography</a>
                            </li>
                            <li><a href="{{ URL::to('advancedfeatures') }}" class="dropdown-item">Advanced Features</a>
                            </li>
                            <li><a href="{{ URL::to('grid') }}" class="dropdown-item">Grid System</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item dropdown {!! (Request::is('aboutus') || Request::is('timeline') || Request::is('faq') || Request::is('blank_page')  ? 'active' : '') !!}">
                        <a href="#" class="nav-link"> Pages</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('aboutus') }}" class="dropdown-item">About Us</a>
                            </li>
                            <li><a href="{{ URL::to('timeline') }}" class="dropdown-item">Timeline</a></li>
                            <li><a href="{{ URL::to('price') }}" class="dropdown-item">Price</a>
                            </li>
                            <li><a href="{{ URL::to('404') }}" class="dropdown-item">404 Error</a>
                            </li>
                            <li><a href="{{ URL::to('500') }}" class="dropdown-item">500 Error</a>
                            </li>
                            <li><a href="{{ URL::to('faq') }}" class="dropdown-item">FAQ</a>
                            </li>
                            <li><a href="{{ URL::to('blank_page') }}" class="dropdown-item">Blank</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {!! (Request::is('products') || Request::is('single_product') || Request::is('compareproducts') || Request::is('category')  ? 'active' : '') !!}">
                        <a href="#" class="nav-link"> Shop</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('products') }}" class="dropdown-item">Products</a>
                            </li>
                            <li><a href="{{ URL::to('single_product') }}" class="dropdown-item">Single Product</a>
                            </li>
                            <li><a href="{{ URL::to('compareproducts') }}" class="dropdown-item">Compare Products</a>
                            </li>
                            <li><a href="{{ URL::to('category') }}"  class="dropdown-item">Categories</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {!! (Request::is('portfolio') || Request::is('portfolioitem') ? 'active' : '') !!}">
                        <a href="#" class="nav-link"> Portfolio</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('portfolio') }}">Portfolio</a>
                            </li>
                            <li><a href="{{ URL::to('portfolioitem') }}">Portfolio Item</a>
                            </li>
                        </ul>
                    </li>
                    @if(Sentinel::check())
                    <li class=" nav-item dropdown {!! (Request::is('user_emails/inbox') || Request::is('user_emails/compose') || Request::is('user_emails/sent') ? 'active' : '') !!}">
                        <a href="#" aria-expanded="false" class="nav-link"> Emails</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ URL::to('user_emails/compose') }}" class="dropdown-item">Compose</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user_emails/inbox') }}" class="dropdown-item">Inbox</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user_emails/sent') }}" class="dropdown-item">Sent</a>
                            </li>
                        </ul>
                    </li>
                @endif
                    <li class="nav-item {!! (Request::is(
                    'news*') ? 'active' : '') !!}"><a href="{{ URL::to('news') }}" class="nav-link">News</a>
                    </li> --}}
                    <li class="nav-item {!! (Request::is(
                    'news') || Request::is('newsitem/*') ? 'active' : '') !!}"><a href="{{ URL::to('news') }}" class="nav-link">
                    News</a>
                    </li>
                    <li class="nav-item {!! (Request::is(
                        'gallery') ? 'active' : '') !!}"><a href="{{ URL::to('gallery') }}" class="nav-link">Gallery</a>
                    </li>
                    <li class="nav-item {!! (Request::is(
                        'tugas-akhir') ? 'active' : '') !!}"><a href="{{ URL::to('tugas-akhir') }}" class="nav-link">TA</a>
                    </li>
                    {{-- <li class="nav-item {!! (Request::is(
                    'contact') ? 'active' : '') !!}"><a href="{{ URL::to('contact') }}" class="nav-link">Contact</a>
                    </li> --}}

                    {{--based on anyone login or not display menu items--}}
                    {{-- @if(Sentinel::guest())
                    <li class="nav-item"><a href="{{ URL::to('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item"><a href="{{ URL::to('register') }}" class="nav-link">Register</a>
                    </li>
                    @else
                    <li class="nav-item {{ (Request::is('my-account') ? 'active' : '') }}"><a href="{{ URL::to('my-account') }}" class="nav-link">My
                        Account</a>
                    </li>
                    <li class="nav-item"><a href="{{ URL::to('logout') }}" class="nav-link">Logout</a>
                    </li>
                    @endif --}}
                </ul>
            </div>
        </nav>
        <!-- Nav bar End -->
    </div>
</header>

<!-- //Header End -->

<!-- slider / breadcrumbs section -->
@yield('top')

<!-- Content -->
@yield('content')

<!-- Footer Section Start -->
<footer>
    <div class=" container">
        <div class="footer-text">
            <!-- About Us Section Start -->
            <div class="row">
                <div class="col-sm-4 col-lg-4 col-md-4 col-12">
                    <h4>About Us</h4>
                    <p>
                            Program Studi ini mengembangkan kemampuan mahasiswa dalam ilmu pengetahuan dan teknologi dari mendesain, membangun, mengimplementasikan, dan memelihara perangkat lunak (software) dan perangkat keras (hardware) dari sistem komputasi modern, peralatan yang dikontrol komputer, dan Perangkat jaringan internet. Ilmu ini mengintegrasikan teknik elektro dan ilmu komputer.
                    </p>
                    <hr id="hr_border2">
                    <h4 class="menu">Follow Us</h4>
                    <ul class="list-inline mb-2">
                        <li>
                            <a href="https://www.facebook.com/polikami/?" target="_blank"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true"
                                            data-c="#ccc" data-hc="#ccc"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/himtekpolikami/?"> <i class="livicon" data-name="instagram" data-size="18" data-loop="true"
                                            data-c="#ccc" data-hc="#ccc"></i>
                            </a>
                        </li>
                        <li>
                            <a  href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=tekom@polteksmi.ac.id&body=my-text" target="_blank"> <i class="livicon" data-name="google-plus" data-size="18" data-loop="true"
                                            data-c="#ccc" data-hc="#ccc"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- //About us Section End -->
                <!-- Contact Section Start -->
                <div class="col-sm-4 col-lg-4 col-md-4 col-12">
                    <h4>Contact Us</h4>
                    <ul class="list-unstyled">
                        <li>Jl. Babakan Sirna No. 25 Benteng</li>
                        <li>Kota Sukabumi, Jawa Barat.</li>
                        <li><i class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true"
                               data-c="#ccc" data-hc="#ccc"></i>Phone: 0852 1086 8034(Whatsapp)

                        </li>
                        <li><i class="livicon icon4 icon3" data-name="printer" data-size="18" data-loop="true"
                               data-c="#ccc" data-hc="#ccc"></i> Fax: (0266)215417
                        </li>
                        <li><i class="livicon icon3" data-name="mail-alt" data-size="20" data-loop="true" data-c="#ccc"
                               data-hc="#ccc"></i> Email:<span class="text-success" style="cursor: pointer;">
                                    tekom@polteksmi.ac.id
                                    </span>
                        </li>
                    </ul>
                    {{-- <hr id="hr_border">
                    <div class="news menu">
                        <h4>News letter</h4>
                        <p>subscribe to our newsletter and stay up to date with the latest news and deals</p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="yourmail@mail.com"
                                   aria-describedby="basic-addon2">
                            <a href="#" class="btn btn-primary text-white" role="button">Subscribe</a>
                        </div>
                    </div> --}}
                </div>
                <!-- //Contact Section End -->
                <!-- Recent post Section Start -->
                <div class="col-sm-4 col-lg-4 col-md-4 col-12">
                        <h4>Contact Form</h4>
                        <!-- Notifications -->
                        <div id="notific">
                        @include('notifications')
                        </div>
                        <form class="contact" id="contact" action="{{route('contact')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <input type="text" name="contact-name" class="form-control input-lg" placeholder="Your name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="contact-email" class="form-control input-lg" placeholder="Your email address" required>
                            </div>
                            <div class="form-group">
                                <textarea name="contact-msg" class="form-control input-lg no-resize resize_vertical" rows="6" placeholder="Your comment" required></textarea>
                            </div>
                            <div class="input-group">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div>
                        </form>
                    <!-- //Recent Post Section End -->
                </div>
            </div>
        </div>
    </div>
<!-- //Footer Section End -->
<div class=" col-12 copyright">
    <div class="container">
        <p>Copyright &copy; Teknik Komputer Politeknik Sukabumi, 2019</p>
    </div>
</div>
</footer>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" data-original-title="Return to top"
   data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="angle-double-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('js/frontend/lib.js') }}"></script>
<!--global js end-->
<!-- begin page level js -->
@yield('footer_scripts')
<!-- end page level js -->
<script>
    $(".navbar-toggler-icon").click(function () {
        $(this).closest('.navbar').find('.collapse').toggleClass('collapse1')
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip().css('font-size', '14px');
    });

    function nFormatter(num){
    if(num >= 1000000000){
      return (num/1000000000).toFixed(1).replace(/\.0$/,'') + 'G';
    }
    if(num >= 1000000){
      return (num/1000000).toFixed(1).replace(/\.0$/,'') + 'M';
    }
    if(num >= 1000){
      return (num/1000).toFixed(1).replace(/\.0$/,'') + 'K';
    }
    return num;
  }

//   var token = '17608976693.1677ed0.78123f737e2a40998802b30341588494',
//     num_photos = 4;

// $.ajax({
// 	url: 'https://api.instagram.com/v1/users/self/media/recent',
// 	dataType: 'jsonp',
// 	type: 'GET',
// 	data: {access_token: token, count: num_photos},
// 	success: function(data){
//  		console.log(data);
// 		for( x in data.data ){
// 			$('.posts').append('<div class="item"><img class="img-fluid"  src="'+data.data[x].images.low_resolution.url+'"></div>');
// 		}
//         $('#himtek-carousel').owlCarousel({
//             center:true,
//             items:1,
//             loop:true,
//             autoPlay:true,
//             autoplayTimeout:500,
//             pagination:false,
//         });
// 	},
// 	error: function(data){
// 		console.log(data);
// 	}
// });

  $.ajax({
    url:"https://www.instagram.com/himtekpolikami?__a=1",
    type:'get',
    success:function(response){
      $(".profile-pic").attr('src',response.graphql.user.profile_pic_url);
      $(".name").html(response.graphql.user.client_id);
      $(".biography").html(response.graphql.user.biography);
      $(".username").html(response.graphql.user.username);
      $(".number-of-posts").html(response.graphql.user.edge_owner_to_timeline_media.count);
      $(".followers").html(nFormatter(response.graphql.user.edge_followed_by.count));
      $(".following").html(nFormatter(response.graphql.user.edge_follow.count));
      posts = response.graphql.user.edge_owner_to_timeline_media.edges;
      posts_html = '';
      console.log(posts)
      for(var i=0;i<posts.length;i++){
        url = posts[i].node.display_url;
        likes = posts[i].node.edge_liked_by.count;
        comments = posts[i].node.edge_media_to_comment.count;
        posts_html += '<div class="item"><div class="thumbnail himtek"><img style="height:100%;background-color:#fff;width:100%;object-fit:cover;" src="'+url+'"></div></div>';
      }
      $(".posts").html(posts_html);
      $('#himtek-carousel').owlCarousel({
            center:true,
            items:1,
            loop:true,
            autoPlay:true,
            autoplayTimeout:500,
            pagination:false,
        });
    }
  });


</script>
</body>

</html>
