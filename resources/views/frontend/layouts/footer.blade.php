
	<!-- Start Footer Area -->
  <!-- <footer class="footer">
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
								<p>Copyright © {{date('Y')}} <a href="" target="_blank"></a>  -  All Rights Reserved.</p>
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
	</footer>  -->
   
  <style>
    /* ================
       Reset & container
       ================ */
    
    a {
      color: inherit;
      text-decoration: none;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
    }
    h4 {
      margin-top: 10px !important;
    }

    /* =========================
       Feature-cards section
       ========================= */
    .features {
      padding: 4rem 0;
    }
    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 2rem;
    }
    .feature-card {
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 2rem 1rem;
      text-align: center;
      transition: box-shadow .2s;
    }
    .feature-card:hover {
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .feature-card .icons {
      font-size: 2rem;
      margin-bottom: 1rem;
    }
    .feature-card h4 {
      font-size: 1.25rem;
      margin-bottom: .5rem;
    }
    .feature-card p {
      color: #666;
      font-size: 0.95rem;
    }

    /* ================
       Footer
       ================ */
    footer.site-footer {
      border-top: 1px solid #ddd;
      padding: 4rem 0 2rem;
    }
    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
      gap: 2rem;
      margin-bottom: 2rem;
    }
    .footer-col h5 {
      font-size: 1.1rem;
      margin-bottom: 1rem;
    }
    .footer-col address,
    .footer-col p,
    .footer-col a {
      display: block;
      color: #555;
      font-size: 0.95rem;
      margin-bottom: .5rem;
    }
    .footer-col ul {
      list-style: none;
    }
    .footer-col ul li {
      margin-bottom: .5rem;
    }
    .footer-col ul li a {
      color: #555;
      font-size: .95rem;
    }
    .footer-col form {
      display: flex;
      flex-wrap: wrap;
      gap: .5rem;
    }
    .footer-col form input[type="email"] {
      flex: 1 1 150px;
      padding: .75rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: .95rem;
    }
    .footer-col form button {
      padding: .75rem 1.25rem;
      background: #000;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      display: flex;
      align-items: center;
      white-space: nowrap;
    }
    .footer-col form button .fa-arrow-right {
      margin-left: .5rem;
      font-size: 0.9rem;
    }
    .footer-social {
      margin-top: 1rem;
      display: flex;
      gap: .75rem;
    }
    .footer-social a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 34px;
      height: 34px;
      border: 1px solid #ccc;
      border-radius: 50%;
      color: #555;
      font-size: 1rem;
      transition: background .2s, color .2s;
    }
    .footer-social a:hover {
      background: #000;
      color: #fff;
    }

    /* ======================
       Back-to-top button
       ====================== */
    .back-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #fff;
      border: 1px solid #000;
      border-radius: 4px;
      width: 44px;
      height: 44px;
      display: grid;
      place-items: center;
      text-decoration: none;
      font-size: 1.25rem;
      color: #000;
      transition: background .2s, color .2s;
      z-index: 100;
    }
    .back-to-top:hover {
      background: #000;
      color: #fff;
    }

    /* ================
       Responsive tweaks
       ================ */
    @media (max-width: 600px) {
      .feature-card { padding: 1.5rem .75rem; }
      .footer-col form { flex-direction: column; }
      .footer-col form button { width: 100%; justify-content: center; }
    }
  </style>


<section class="features">
    <div class="container">
      <div class="features-grid">
        <div class="feature-card">
          <div class="icons"><i class="fa-solid fa-box"></i></div>
          <h4>Free Shipping</h4>
          <p>You will love at great low prices</p>
        </div>
        <div class="feature-card">
          <div class="icons"><i class="fa-solid fa-credit-card"></i></div>
          <h4>Flexible Payment</h4>
          <p>Pay with Multiple Credit Cards</p>
        </div>
        <div class="feature-card">
          <div class="icons"><i class="fa-solid fa-arrow-left"></i></div>
          <h4>14 Day Returns</h4>
          <p>Within 30 days for an exchange</p>
        </div>
        <div class="feature-card">
          <div class="icons"><i class="fa-solid fa-headphones-simple"></i></div>
          <h4>Premium Support</h4>
          <p>Outstanding premium support</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <!-- Address -->
        <div class="footer-col">
          <h5>Contact Us</h5>
          <address>
            1234 Fashion Street, Suite 567,<br>
            New York, NY
          </address>
          <a href="mailto:info@fashionshop.com">info@fashionshop.com</a>
          <a href="tel:+12125551234"><strong>(212) 555-1234</strong></a>
          <a href="https://maps.google.com" target="_blank">Get direction <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
          <div class="footer-social">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
          </div>
        </div>
        <!-- Help -->
        <div class="footer-col">
          <h5>Help</h5>
          <ul>
            <li><a href="#">Search</a></li>
            <li><a href="{{route('order.track')}}">Order Tracking</a></li>
          </ul>
        </div>
        <!-- Useful Links -->
        <div class="footer-col">
          <h5>Useful Links</h5>
          <ul>
            <li><a href="#">Necklace Set</a></li>
            <li><a href="#">Bangles</a></li>
            <li><a href="#">Earrings</a></li>
            <li><a href="#">Earrings And Maang Tikka</a></li>
            <li><a href="#">Payal</a></li>
            <li><a href="#">Semi Bridal Set</a></li>
          </ul>
        </div>
        <!-- Email Signup -->
        <div class="footer-col">
          <h5>Sign Up for Email</h5>
          <p>Sign up to get first dibs on new arrivals, sales, exclusive content, events and more!</p>
          <form action="#" method="POST">
            <input type="email" placeholder="Enter email address" required>
            <button type="submit">
              Subscribe <i class="fa-solid fa-arrow-right"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </footer>
  <a href="#top" class="back-to-top" aria-label="Back to top">
    <i class="fa-solid fa-chevron-up"></i>
  </a>


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
  
<script>
      let index = 0;
      const items = document.querySelectorAll('#carouselItems > div');
      const totalItems = items.length;
      const carouselItems = document.getElementById('carouselItems');
      
      // Clone first and last slides to create infinite loop effect
      const firstSlide = items[0].cloneNode(true);
      const lastSlide = items[totalItems - 1].cloneNode(true);
      carouselItems.appendChild(firstSlide); // Append first slide at the end
      carouselItems.insertBefore(lastSlide, items[0]); // Insert last slide at the beginning
    
      const newItems = document.querySelectorAll('#carouselItems > div');
      const totalNewItems = newItems.length;
    
      function changeSlide() {
        // When the first or last image reaches, reset the index to create an infinite loop feel
        if (index >= totalNewItems) {
          carouselItems.style.transition = 'none'; // Disable transition for the reset
          carouselItems.style.transform = `translateX(0%)`; // Go back to the first image
          index = 1; // Skip the first cloned image
          setTimeout(() => {
            carouselItems.style.transition = 'transform 0.7s ease-in-out'; // Re-enable transition
          }, 50);
        } else if (index < 0) {
          carouselItems.style.transition = 'none'; // Disable transition for the reset
          carouselItems.style.transform = `translateX(-${(totalNewItems - 2) * 100}%)`; // Go to the last image
          index = totalNewItems - 3; // Skip the last cloned image
          setTimeout(() => {
            carouselItems.style.transition = 'transform 0.7s ease-in-out'; // Re-enable transition
          }, 50);
        } else {
          carouselItems.style.transform = `translateX(-${index * 100}%)`; 
        }
      }
    
      setInterval(() => {
        index = (index + 1) % totalNewItems; // Increment index for infinite loop
        changeSlide();
      }, 3000); 
      changeSlide(); // Initialize the first slide
    
      // Previous and Next buttons functionality
      document.querySelector('[data-carousel-prev]').addEventListener('click', () => {
        index = (index - 1 + totalNewItems) % totalNewItems;
        changeSlide();
      });
    
      document.querySelector('[data-carousel-next]').addEventListener('click', () => {
        index = (index + 1) % totalNewItems;
        changeSlide();
      });
    </script>