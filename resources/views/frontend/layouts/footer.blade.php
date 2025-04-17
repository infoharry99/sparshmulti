
	<!-- Start Footer Area -->
	<!-- <footer class="footer">
		<!-- Footer Top 
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
   <section class="footerlinks-sec sectionhalf">
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-lg-12">
                   <div class="section-heading">
                       <h3 class="text-center mb-5">
                           <ul class="footer-links">
                               <li><a href="" class="active">Home</a></li>
                               <li><a href="">Gallery</a></li>
                               <li><a href="">About</a></li>
                               <li><a href="">Event</a></li>
                               <li><a href="">Blog</a></li>
                               <li><a href="">Contact</a></li>
                           </ul>
                       </h3>
                   </div>
               </div>
               <div class="col-lg-5">
                   <div class="newsletter text-center">
                       <h5>Newsletter</h5>
                       <p>Receive our newsletter for art lovers and collectors</p>
                       <form>
                        <input type="text" placeholder="Your E-mail ID" name="" class="form-control">
                        <button class="sign-up">Sign Up</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- footer links sec end  -->

   <!-- copyright sec start -->
   <section class="copyright-sec sectionhalf">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <ul class="copyright-list">
                       <li><a href="#">Terms Of Use</a></li>
                       <li><a href="">Privacy Policy</a></li>
                       <li>© 2024 Melody Brush. All rights reserved.</li>
                       <li>Powered by <a href="" class="creat-a">www.digibrandx.com</a></li>
                   </ul>
               </div>
           </div>
       </div>
   </section>
   <!-- copyright sec end -->
   
   </footer>
   <!-- footer sec start -->
   


   <div class="mobile-cart-sec">
       <ul class="e-com-list">
           <li><a href="javascript:void(0)" class="search-btn"><img src="images/search.png" class="img-fluid"></a></li>
           <li><a href="cart.html"><img src="images/cart.png" class="img-fluid"></a></li>
           <li><a href="dashbord.html"><img src="images/profile.png" class="img-fluid"></a></li>
        </ul>
   </div>


   <div class="main-search-area">
       <button class="srh-close"><img src="images/x.png" class="img-fluid"></button>
       <div class="container">
           <div class="row justify-content-center text-center">
               <div class="col-lg-7">
                <div class="searh-cotnent">
                   <h3>What You Search Today</h3>
                   <form class="srh-form">
                       <input type="text" placeholder="Search" name="">
                       <button class="searh-btn"><img src="images/srh-img.png" class="img-fluid"></button>
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
    <script src="js/jquery.ripples.js"></script>
    <script src="js/custom.js"></script>  
    <script>
			// Fancybox Config
	Fancybox.bind('[data-fancybox]', {
	//
	}); 
    </script>
    <script>
        AOS.init();
      </script>

	Jquery
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

	<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('frontend/js/easing.js')}}"></script>

	<!-- Active JS -->
	<script src="{{asset('frontend/js/active.js')}}"></script>

	
	@stack('scripts')
	<script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
		// ------------------------------------------------------- //
		// Multi Level dropdowns
		// ------------------------------------------------------ //
			$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
				event.preventDefault();
				event.stopPropagation();

				$(this).siblings().toggleClass("show");


				if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
				}
				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
				});

			});
		});
	  </script>