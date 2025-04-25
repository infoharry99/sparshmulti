
	<!-- Start Footer Area -->
	<!-- <footer class="footer">
		Footer Top 
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="{{asset('backend/img/logo2.png')}}" alt="#"></a>
							</div>
							@php
								$settings=DB::table('settings')->get();
							@endphp
							<p class="text">@foreach($settings as $data) {{$data->short_des}} @endforeach</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">@foreach($settings as $data) {{$data->phone}} @endforeach</a></span></p>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="{{route('about-us')}}">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="{{route('contact')}}">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<div class="contact">
								<ul>
									<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
									<li>@foreach($settings as $data) {{$data->email}} @endforeach</li>
									<li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
								</ul>
							</div>
							<div class="sharethis-inline-follow-buttons"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © {{date('Y')}} <a href="https://github.com/Prajwal100" target="_blank">Prajwal Rai</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="{{asset('backend/img/payments.png')}}" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer> -->
	<!-- /End Footer Area -->
   <!-- footer links sec start  -->
  <!-- follow sec start -->
  
  <footer>
      <!-- instagram sec start -->
    
      <!-- instagram sec end -->

      <section class="instagram-sec sectionpadding">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h3 class="text-center mb-5">
                  <i class="fab fa-instagram"></i>@lang('home.instagram')
                </h3>
              </div>

              <div class="instrgram-slider owl-carousel">
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
      <!-- follow sec start -->
      <section class="follow-sec sectionpadding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h3 class="text-center mb-5">@lang('home.follow_us')</h3>
                    </div>
                    <div class="social-links">
                        <ul>
                            <li><a href=""><img src="{{asset('images/facebook.png')}}" class="img-fluid"/></a></li>
                            <li><a href=""><img src="{{asset('images/instra.png')}}" class="img-fluid"/></a></li>
                            <li><a href=""><img src="{{asset('images/pin.png')}}" class="img-fluid"/></a></li>
                            <li><a href=""><img src="{{asset('images/you.png')}}" class="img-fluid"/></a></li>
                            <li><a href=""><img src="{{asset('images/in.png')}}" class="img-fluid"/></a></li>
                            <li><a href=""><img src="{{asset('images/twi.png')}}" class="img-fluid"/></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <section class="footerlinks-sec sectionhalf">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-12">
                      <div class="section-heading">
                          <h3 class="text-center mb-5">
                              <ul class="footer-links">
                                  <li><a href="{{ route('home') }}" class="active">@lang('home.home')</a></li>
                                  <li><a href="{{ route('product-grids') }}">@lang('home.gallery')</a></li>
                                  <li><a href="{{ route('about-us') }}">@lang('home.about')</a></li>
                                  <li><a href="{{ route('blog') }}">@lang('home.blog')</a></li>
                                  <li><a href="{{ route('contact') }}">@lang('home.contact')</a></li>
                              </ul>
                          </h3>
                      </div>
                  </div>
                  <div class="col-lg-5">
                      <div class="newsletter text-center">
                          <h5>@lang('home.newsletter')</h5>
                          <p>@lang('home.newsletter_text')</p>
                          <form action="#" class="newsletter-inner">
                              <input type="text" placeholder="@lang('home.email_placeholder')" name="email" class="form-control"/>
                              <button type="submit" class="sign-up">@lang('home.sign_up')</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="copyright-sec sectionhalf">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <ul class="copyright-list">
                          <li><a href="{{url('/terms')}}">@lang('home.terms')</a></li>
                          <li><a href="{{url('/terms')}}">@lang('home.privacy')</a></li>
                          <li>© 2024 Melody Brush. @lang('home.rights')</li>
                          <li>
                              @lang('home.powered_by') <a href="" class="creat-a">www.digibrandx.com</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </section>

    <!-- footer sec start -->
   


   <div class="mobile-cart-sec">
       <ul class="e-com-list">
           <li><a href="javascript:void(0)" class="search-btn"><img src="{{asset('images/search.png')}}" class="img-fluid"></a></li>
           <li><a href="cart.html"><img src="{{asset('images/cart.png')}}" class="img-fluid"></a></li>
           <li><a href="dashbord.html"><img src="{{asset('images/profile.png')}}" class="img-fluid"></a></li>
        </ul>
   </div>


   <div class="main-search-area">
       <button class="srh-close"><img src="{{asset('images/x.png')}}" class="img-fluid"></button>
       <div class="container">
           <div class="row justify-content-center text-center">
               <div class="col-lg-7">
                <div class="searh-cotnent">
                   <h3>What You Search Today</h3>
                   <form class="srh-form">
                       <input type="text" placeholder="Search" name="">
                       <button class="searh-btn"><img src="{{asset('images/srh-img.png')}}" class="img-fluid"></button>
                   </form>
               </div>
               </div>
           </div>
       </div>
   </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('js/jquery.ripples.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>  
  
    

	{{-- Jquery --}}
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/colors.js')}}"></script>
	<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
	<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
	<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
	<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
	<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
	<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
	<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
	<script src="{{asset('frontend/js/scrollup.js')}}"></script>
	<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('frontend/js/easing.js')}}"></script>

	<!-- Active JS -->
	<script src="{{asset('frontend/js/active.js')}}"></script>

  <script>
    $(document).ready(function(){
        $('.share-bar, .share-buttons, .social-share, #social-share-sidebar')
            .hide(); // Add your exact class/ID here if known
    });
</script>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const shareBar = document.querySelector('.sharethis-sticky-share-buttons');
        if (shareBar) shareBar.style.display = 'none';
    });
</script>

<script>
    window.addEventListener('load', () => {
        setTimeout(() => {
            const stickyBar = document.querySelector('.sharethis-sticky-share-buttons');
            const inlineButtons = document.querySelector('.sharethis-inline-follow-buttons');

            if (stickyBar) stickyBar.style.display = 'none';
            if (inlineButtons) inlineButtons.style.display = 'none';
        }, 10000); // Delay to wait for async loading
    });
</script>