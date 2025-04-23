@extends('frontend.layouts.master')
@section('title','E-Paninting || HOME PAGE')
@section('main-content')

<style>
    .sc-button-group .sc-button-download .soundHeader{ 
        display:none !important;
    }
</style>



    <!-- subbanner sec start -->
    <section class="subbanner-sec sectionpadding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                      </ol>
                    </nav>
                    <div class="section-heading">
                        <h3>Painting Title Painting Title </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subbanner sec end -->

   

   <!-- product play sec start -->
   <section class="product-play padding-top">
       <div class="container">
           <div class="row">
               <!-- <div class="product-play-slider owl-carousel">
                   <div class="product-play-item">
                       <a href="images/banner.png" data-fancybox="product-pay"><img src="images/banner.png"><button class="pd-play-zoom"><i class="fas fa-search-plus"></i></button></a>
                       
                   </div>
                   <div class="product-play-item">
                       <a href="images/banner.png" data-fancybox="product-pay"><img src="images/banner.png"><button class="pd-play-zoom"><i class="fas fa-search-plus"></i></button></a>
                       
                   </div>
                   <div class="product-play-item">
                       <a href="images/banner.png" data-fancybox="product-pay"><img src="images/banner.png"><button class="pd-play-zoom"><i class="fas fa-search-plus"></i></button></a>

                   </div>
               </div> -->

               <div class="col-lg-12">
                   <div class="product-play-item">
                       <a href="images/banner.png" data-fancybox="product-pay"><img src="{{asset('images/banner.png')}}"><button class="pd-play-zoom"><i class="fas fa-search-plus"></i></button></a>

                   </div>
               </div>


               <iframe width="100%" height="80" scrolling="no" frameborder="no" allow="autoplay"

                src="https://w.soundcloud.com/player/?url=https://soundcloud.com/farazhbk/kaise-kasie-log?si=8b44a63291bf4605b6ae6549d7af5995&utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing">

               </iframe>

               <div class="lyrics-area mt-5">
                   <div class="row">
                       <div class="col-6 col-lg-10">
                           <h3>Lyrics</h3>
                       </div>
                       <div class="col-6 col-lg-2">
                           <select class="form-select">
                               <option selected>English</option>
                               <option selected>Bengali</option>
                               <option>Hindi</option>
                           </select>
                       </div>
                       <div class="col-lg-12 mt-3">
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                       </div>
                   </div>
               </div>

               <div class="product-play-share mt-5">
                   <div class="social-links">
                       <ul>
                           <li><button><img src="{{asset('images/chat.png')}}" class="img-fluid"><span> 120</span></button></li>
                           <li><button><img src="{{asset('images/heart.png')}}" class="img-fluid"> <span> 89</span></button></li>
                           <li><a href=""><img src="{{asset('images/facebook.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/instra.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/pin.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/you.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/in.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/twi.png')}}" class="img-fluid"></a></li>
                       </ul>
                   </div>
               </div>
               <div class="about-product mt-5">
                   <h3 class="mb-3">About The Paintings</h3>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
               </div>

               <div class="related-product mt-5">
                <h3 class="mb-3">Related Product</h3>
                <div class="featured-slider owl-carousel">
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>                                                                
               </div>
               </div>
           </div>
       </div>
   </section>
   <!-- product play sec end -->








  @endsection