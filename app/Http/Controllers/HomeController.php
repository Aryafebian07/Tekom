<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Fokus\Focus;
use App\Models\Prodi\Prodi;
use App\Models\BlogComment;
use App\Http\Requests\BlogCommentRequest;
use App\Models\Dosen\Dosen;
use App\Models\Testimonial\Testimonial;
use App\models\Headercarousel\HeaderCarousel;
use App\Models\Gallery\GalleryPhoto;
use App\Models\Tugasakhir\TugasAkhir;
use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
use Vinkla\Instagram\Instagram;

class HomeController extends JoshController
{

    private $tags;

    public function __construct()
    {
        parent::__construct();
        $this->tags = Blog::allTags();
    }

    /**
     * @return \Illuminate\View\View
     */

    function index() {
        $id = 1;
        // Grab all the blogs
        $foci = Focus::all();
        $dosens = Dosen::all();
        $testimonials = Testimonial::all();
        $prodis = Prodi::latest()->where('id',$id)->take(3)->get();
        $headerCarousels = HeaderCarousel::where('status',1)->get();
        $blogs = Blog::latest()->take(5)->get();
        $galleryphotos = GalleryPhoto::latest()->take(10)->get();
        $tags = $this->tags;

        $API_key    = 'AIzaSyBf89DsVmH2fvZTMgalTwkdrH71J3GHWRM';
        $channelID  = 'UC2JzylaIF8qeowc75VwwmA';
        $maxResults = 3;

        $videoList = Youtube::listChannelVideos('UCk1SpWNzOs4MYmr0uICEntg', $maxResults);
        return view('index', compact('blogs', 'tags','foci','prodis','dosens','testimonials','headerCarousels','galleryphotos','videoList'));
    }

    function gallery_index(){
        $galleryphotos = GalleryPhoto::latest()->get();
        return view('gallery', compact('galleryphotos'));
    }

    function tugasakhir_index(){
        $tugasAkhirs = TugasAkhir::all();
        return view('tugasakhir', compact('tugasAkhirs'));
    }


    public function instagramFeed(){

        return view('layouts.default', compact('instagrams'));
    }
}
