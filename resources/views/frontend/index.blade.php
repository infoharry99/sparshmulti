@extends('frontend.layouts.master')
@section('title', __('home.title')) {{-- Translatable title --}}
@section('main-content')
<style>
    .blog-sec {
        padding: 60px 20px;
        background: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .blog-heading {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
        }

        .blog-row {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .blog-card {
            flex: 0 0 30%;
            background: #fff;
            text-align: center;
            position: relative;
        }

        .blog-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .blog-image-wrapper img  {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.4s ease;
            border-radius: 10px;
        }
        .blog-image {
            width: 100%;
            height: auto;
            display: block;
        }

        .blog-label {
            position: absolute;
            top: 130px;
            left: 10px;
            background: black;
            color: #fff;
            font-size: 10px;
            padding: 6px 15px;
            font-weight: bold;
            border-radius: 4px;
        }

        .blog-title {
            font-size: 22px;
            margin: 20px 0 15px;
            padding: 0 10px;
        }

        .read-more {
            display: inline-flex;
            align-items: center;
            font-weight: bold;
            color: black;
            text-decoration: none;
            margin-top: 10px;
            font-size: 16px;
        }

        .read-more .arrow {
        margin-left: 5px;
        font-size: 18px;
        transition: transform 0.3s ease;
        }

        .read-more:hover .arrow {
        transform: translateX(5px);
        }


    .product-card {
        position: relative;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-img-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .product-img-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.4s ease;
            border-radius: 10px;
        }

        .product-hover-icons {
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 10px;
            opacity: 0;
            transition: all 0.2s ease;
        }

        .product-hover-icons button {
            background: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 10px;
            cursor: pointer;
            font-size: 14px;
            color: #333;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.15);
        }

        .product-card:hover .product-img-wrapper img {
            transform: scale(1.1);
        }

        .product-card:hover .product-hover-icons {
        opacity: 1;
        }

        .product-details {
            
            padding: 10px 5px;
        }
        .h4 {
            margin-top: 10px !important;
        }

        .product-title {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 14px;
            color: #000;
        }

    .featured-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
    }

    .featured-img {
        position: relative;
    }

    .featured-img img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 10px;
        transition: transform 0.4s ease;
    }

        .featured-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .featured-item:hover img {
            transform: scale(1.05);
        }

        .featured-item:hover .featured-overlay {
            opacity: 1;
        }

        .featured-overlay h4 {
            font-size: 16px;
            margin: 0;
        }

</style>
@if(count($banners) > 0)
    <section id="Gslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($banners as $key => $banner)
                <li data-target="#Gslider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($banners as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img class="first-slide" src="{{ $banner->photo }}" alt="Slide {{ $key + 1 }}">
                    <div class="carousel-caption d-none d-md-block text-left">
                        <!-- <h1 class="wow fadeInDown">{{ $banner->title }}</h1> -->
                        <!-- <p>{!! html_entity_decode($banner->description) !!}</p> -->
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">@lang('home.previous')</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">@lang('home.next')</span>
        </a>
    </section>
@endif
@php
    $locale = app()->getLocale();
@endphp


   <!-- popular sec start -->
    <section class="feature-sec sectionpadding">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                <h1 class="text-center mt-5"><strong>Everyday Demi-fine Jewellery</strong></h1>
                </div>
            </div>

            <div class="featured-slider owl-carousel">
                @php
                $product_listss = DB::table('products')->where('status', 'active')->orderBy('id', 'DESC')->limit(6)->get();
                @endphp

                @foreach($product_listss as $product)
                <div class="featured-item">
                <a href="#">
                    <div class="featured-img">
                    @php
                        $photos = json_decode($product->photo);
                    @endphp
                    @if(!empty($photos) && isset($photos[0]))
                        <a href="{{route('product-grids',$product->slug)}}"><img src="{{ asset($photos[0]) }}" alt="{{ $product->title }}" class="img-fluid"></a>
                    @endif
                    <div class="featured-overlay">
                        <h4 class="title">{{ $product->title }}</h4>
                    </div>
                    </div>
                </a>
                </div>
                @endforeach

            </div>
            </div>
        </div>
    </section>
  
   <!-- popular sec end -->
        <section class="banner-sec mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <img class="first-slide" src="{{ asset('/frontend/banner/image.png') }}" alt="Slide 1">
                </div>
            </div>
        </section>

        <section class="feature-sec sectionpadding mt-5">
          <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                        <h1 class="text-center mt-5"><strong>Best Seller</strong></h1>
                        <p class="text-center">Shop the Latest Styles: Stay ahead of the curve with our newest arrivals</p>
                        </div>
                    </div>

                    <div class="row g-4 mt-4">
                        @php
                        $product_listss = DB::table('products')->where('status', 'active')->orderBy('id', 'DESC')->limit(6)->get();
                        @endphp

                        @foreach($product_listss as $product)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product-card">
                                <div class="product-img-wrapper">
                                    @php
                                        $photos = json_decode($product->photo);
                                    @endphp
                                    @if(!empty($photos) && isset($photos[0]))
                                       <a href="{{route('product-grids',$product->slug)}}"> <img src="{{ asset($photos[0]) }}" alt="{{ $product->title }}" class="img-fluid"></a>
                                    @endif
                                    <div class="product-hover-icons">
                                        
                                        <button><a href="{{route('add-to-cart',$product->slug)}}">
                                            <i class="fas fa-shopping-bag"></i>
                                            </a>
                                        </button>
                                        <button><a href="{{route('add-to-wishlist',$product->slug)}}"><i class="far fa-heart"></i></a></button>

                                        <button><i class="far fa-times-circle"></i></button>
                                        <button><i class="far fa-eye"></i></button>
                                    </div>
                                </div>

                                <div class="product-details mt-2">
                                <h5 class="product-title">{{ $product->title }}</h5>
                                <p class="product-price"><strong>Rs. {{ number_format($product->discount, 2) }}</strong></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

     <!-- blog sec start -->
    
        <section class="blog-sec">
            <div class="container">
                <h2 class="blog-heading">Blogs</h2>
                <div class="blog-row">

                @if($posts)
                    @foreach($posts as $post)
                    <div class="blog-card">
                        <div class="blog-image-wrapper">
                        <a href="{{ route('blog.detail', $post->slug) }}">
                            <div class="featured-img">
                                <img src="{{ $post->photo }}" alt="{{ $post->title }}" class="blog-image">
                            </div>
                        </a>
                        <span class="blog-label">Blog</span>
                        </div>
                        <h3 class="blog-title">{{ $post->title }}</h3>
                        <a href="{{ route('blog.detail', $post->slug) }}" class="read-more">
                        Read more <span class="arrow">↗</span>
                        </a>
                    </div>
                    @endforeach
                @endif

                </div>
            </div>
        </section>
<!-- Blog Section End -->

   <!-- blog sec end -->

    @if($product_lists)
        @foreach($product_lists as $key=>$product)
            <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row no-gutters">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                            <div class="product-gallery">
                                                <div class="quickview-slider-active">
                                                    @php
                                                        $photo=explode(',',$product->photo);
                                                    @endphp
                                                    @foreach($photo as $data)
                                                        <div class="single-slider">
                                                            <img src="{{$data}}" alt="{{$data}}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        <!-- End Product slider -->
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="quickview-content">
                                            <h2>{{$product->title}}</h2>
                                            <div class="quickview-ratting-review">
                                                <div class="quickview-ratting-wrap">
                                                    <div class="quickview-ratting">
                                                        @php
                                                            $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                            $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                                        @endphp
                                                        @for($i=1; $i<=5; $i++)
                                                            @if($rate>=$i)
                                                                <i class="yellow fa fa-star"></i>
                                                            @else
                                                            <i class="fa fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <a href="#"> ({{$rate_count}} customer review)</a>
                                                </div>
                                                <div class="quickview-stock">
                                                    @if($product->stock >0)
                                                    <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} in stock</span>
                                                    @else
                                                    <span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} out stock</span>
                                                    @endif
                                                </div>
                                            </div>
                                            @php
                                                $after_discount=($product->price-($product->price*$product->discount)/100);
                                            @endphp
                                            <h3><small><del class="text-muted">${{number_format($product->price,2)}}</del></small>    ${{number_format($after_discount,2)}}  </h3>
                                            <div class="quickview-peragraph">
                                                <p>{!! html_entity_decode($product->summary) !!}</p>
                                            </div>
                                            @if($product->size)
                                                <div class="size">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            <h5 class="title">Size</h5>
                                                            <select>
                                                                @php
                                                                $sizes=explode(',',$product->size);
                                                                // dd($sizes);
                                                                @endphp
                                                                @foreach($sizes as $size)
                                                                    <option>{{$size}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        {{-- <div class="col-lg-6 col-12">
                                                            <h5 class="title">Color</h5>
                                                            <select>
                                                                <option selected="selected">orange</option>
                                                                <option>purple</option>
                                                                <option>black</option>
                                                                <option>pink</option>
                                                            </select>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            @endif
                                            <form action="{{route('single-add-to-cart')}}" method="POST" class="mt-4">
                                                @csrf
                                                <div class="quantity">
                                                    <!-- Input Order -->
                                                    <div class="input-group">
                                                        <div class="button minus">
                                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                                <i class="ti-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="hidden" name="slug" value="{{$product->slug}}">
                                                        <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                                        <div class="button plus">
                                                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                                <i class="ti-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!--/ End Input Order -->
                                                </div>
                                                <div class="add-to-cart">
                                                    <button type="submit" class="btn">Add to cart</button>
                                                    <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
                                                </div>
                                            </form>
                                            <div class="default-social">
                                            <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    @endif
    @endsection

@push('styles')
    <!-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script> -->
    <!-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script> -->
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        /* background: #000000; */
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>

        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });

        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

@endpush
