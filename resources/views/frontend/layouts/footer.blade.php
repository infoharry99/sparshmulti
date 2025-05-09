
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
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Mobile Navigation - Base Styles */
    .mobile-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #ffffff;
      display: flex;
      justify-content: space-around;
      padding: 8px 0;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    .nav-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-decoration: none;
      color: #333;
      font-size: 11px;
      position: relative;
      padding: 0 2px;
    }

    .nav-icon {
      font-size: 18px;
      margin-bottom: 2px;
    }

    .badge {
      position: absolute;
      top: -5px;
      right: -5px;
      background-color: #ff0000;
      color: white;
      border-radius: 50%;
      width: 16px;
      height: 16px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 9px;
      font-weight: bold;
    }

    
    body {
      padding-bottom: 55px;
    }
    @media screen and (max-width: 767px) {
      .mobile-nav {
        padding: 6px 0;
      }
      
      .nav-item {
        font-size: 10px;
        padding: 0;
      }
      
      .nav-icon {
        font-size: 16px;
        margin-bottom: 1px;
      }
      
      .badge {
        width: 14px;
        height: 14px;
        font-size: 8px;
        top: -3px;
        right: -3px;
      }
    }

    /* Regular mobile adjustments */
    @media (max-width: 768px) {
      
      .site-footer {
        padding-bottom: 55px;
      }
      .back-to-top {
        bottom: 65px;
      }
    }

    /* Desktop visibility */
    @media (min-width: 769px) {
      .mobile-nav {
        display: none;
      }
      
      body {
        padding-bottom: 0;
      }
    }
  </style>
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
    }
    
    body {
      background-color: #f9f9f9;
      color: #333;
      line-height: 1.6;
    }
    
    a {
      color: inherit;
      text-decoration: none;
    }
    
    .container {
      width: 100%;
      padding: 0 15px;
      max-width: 1400px;
      margin: 0 auto;
    }
    
    /* Footer Styles */
    .site-footer {
      background-color: #fff;
      border-top: 1px solid #ddd;
      padding-top: 20px;
      padding-bottom: 30px;
    }
    
    /* Desktop Footer */
    .footer-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 30px;
    }
    
    .footer-col h5 {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 20px;
      color: #333;
    }
    
    .footer-col address,
    .footer-col p,
    .footer-col a {
      display: block;
      color: #555;
      font-size: 14px;
      margin-bottom: 8px;
    }
    
    .footer-col ul {
      list-style: none;
    }
    
    .footer-col ul li {
      margin-bottom: 8px;
    }
    
    .footer-col ul li a {
      color: #555;
      font-size: 14px;
    }
    
    .footer-col form {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    
    .footer-col form input[type="email"] {
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
    }
    
    .footer-col form button {
      padding: 12px 15px;
      background: #000;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      font-weight: 600;
    }
    
    .footer-col form button .fa-arrow-right {
      margin-left: 8px;
    }
    
    .footer-social {
      margin-top: 15px;
      display: flex;
      gap: 12px;
    }
    
    .footer-social a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border: 1px solid #ddd;
      border-radius: 50%;
      color: #555;
      font-size: 16px;
      transition: all 0.2s ease;
    }
    
    .footer-social a:hover {
      background: #000;
      color: #fff;
      border-color: #000;
    }
    
    /* Mobile Footer */
    .footer-section {
      margin-bottom: 15px;
      display: none; /* Hidden on desktop */
    }
    
    .footer-heading {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 0;
      border-bottom: 1px solid #eee;
      font-size: 16px;
      font-weight: 600;
    }
    
    .footer-content {
      padding: 10px 0;
      display: none;
    }
    
    .footer-content.active {
      display: block;
    }
    
    .toggle-icon {
      transition: transform 0.3s ease;
    }
    
    .footer-heading.active .toggle-icon {
      transform: rotate(180deg);
    }
    
    /* Back to top button */
    .back-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #fff;
      border: 1px solid #000;
      border-radius: 4px;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #000;
      font-size: 18px;
      z-index: 100;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .back-to-top:hover {
      background: #000;
      color: #fff;
    }
    
    /* Media queries for responsive design */
    @media (max-width: 992px) {
      .footer-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    
    @media (max-width: 768px) {
      /* Hide desktop footer, show mobile footer */
      .footer-grid {
        display: none;
      }
      
      .footer-section {
        display: block;
      }
      
      .footer-col form {
        flex-direction: column;
      }
      
      .footer-col form input[type="email"],
      .footer-col form button {
        width: 100%;
      }
    }
  </style>

  
  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <!-- Desktop Footer -->
      <div class="footer-grid">
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
        
        <div class="footer-col">
          <h5>Help</h5>
          <ul>
            <li><a href="#">Search</a></li>
            <li><a href="#">Order Tracking</a></li>
          </ul>
        </div>
        
        <div class="footer-col">
          <h5>Useful Links</h5>
          <ul>
            <li><a href="#">Necklace Set</a></li>
            <li><a href="#">Bangles</a></li>
            <li><a href="#">Earrings</a></li>
            <li><a href="#">Earrings And Maang Tikka</a></li>
            <li><a href="#">Payal</a></li>
            <li><a href="#">Semi Bridal Set</a></li>
            <li><a href="#">Bracelet</a></li>
            <li><a href="#">Bridal Set</a></li>
            <li><a href="#">Jhumka And Maang Tikka</a></li>
            <li><a href="#">Long Rain Haar</a></li>
            <li><a href="#">Hath Panja</a></li>
          </ul>
        </div>
        
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
      
      <!-- Mobile Footer -->
      <div class="footer-section">
        <div class="footer-heading" onclick="toggleSection(this)">
          Contact Us
          <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="footer-content">
          <div class="contact-info">
            <a href="#">
              1234 Fashion Street, Suite 567,<br>
              New York, NY
            </a>
            <a href="mailto:info@fashionshop.com">info@fashionshop.com</a>
            <a href="tel:+12125551234"><strong>(212) 555-1234</strong></a>
            <a href="https://maps.google.com" target="_blank">
              Get direction <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
          </div>
          <div class="footer-social">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
          </div>
        </div>
      </div>
      
      <div class="footer-section">
        <div class="footer-heading" onclick="toggleSection(this)">
          Help
          <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="footer-content">
          <ul class="footer-links">
            <li><a href="#">Search</a></li>
            <li><a href="#">Order Tracking</a></li>
          </ul>
        </div>
      </div>
      
      <div class="footer-section">
        <div class="footer-heading" onclick="toggleSection(this)">
          Useful Links
          <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="footer-content">
          <ul class="footer-links">
            <li><a href="#">Necklace Set</a></li>
            <li><a href="#">Bangles</a></li>
            <li><a href="#">Earrings</a></li>
            <li><a href="#">Earrings And Maang Tikka</a></li>
            <li><a href="#">Payal</a></li>
            <li><a href="#">Semi Bridal Set</a></li>
            <li><a href="#">Bracelet</a></li>
            <li><a href="#">Bridal Set</a></li>
            <li><a href="#">Jhumka And Maang Tikka</a></li>
            <li><a href="#">Long Rain Haar</a></li>
            <li><a href="#">Hath Panja</a></li>
            <li><a href="#">Mathapati</a></li>
            <li><a href="#">Passa</a></li>
            <li><a href="#">Maang Tikka</a></li>
            <li><a href="#">Waist Belt</a></li>
            <li><a href="#">Dulha Mala</a></li>
            <li><a href="#">Sheeshful</a></li>
          </ul>
        </div>
      </div>
      
      <div class="footer-section">
        <div class="footer-heading" onclick="toggleSection(this)">
          Sign Up for Email
          <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="footer-content">
          <div class="email-form">
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
    </div>
  </footer>

  <a href="#top" class="back-to-top" aria-label="Back to top">
    <i class="fa-solid fa-chevron-up"></i>
  </a>

  <script>
    // Add this script to ensure the mobile navigation active state works
    document.addEventListener('DOMContentLoaded', function() {
      const navItems = document.querySelectorAll('.mobile-nav .nav-item');
      
      navItems.forEach(item => {
        item.addEventListener('click', function(e) {
          // Remove active class from all items
          navItems.forEach(i => i.classList.remove('active'));
          
          // Add active class to clicked item
          this.classList.add('active');
        });
      });
    });
  </script>
 <script>
    function toggleSection(element) {
      element.classList.toggle('active');
      const content = element.nextElementSibling;
      content.classList.toggle('active');
    }
    
    // Open the first section by default on mobile
    document.addEventListener('DOMContentLoaded', function() {
      // Only activate on mobile view
      if (window.innerWidth <= 768) {
        const firstSection = document.querySelector('.footer-heading');
        const firstContent = document.querySelector('.footer-content');
        
        if(firstSection && firstContent) {
          firstSection.classList.add('active');
          firstContent.classList.add('active');
        }
      }
    });
    
    // Re-check on window resize
    window.addEventListener('resize', function() {
      const sections = document.querySelectorAll('.footer-section');
      
      if (window.innerWidth <= 768) {
        // Show at least the first section on mobile
        const firstSection = document.querySelector('.footer-heading');
        const firstContent = document.querySelector('.footer-content');
        
        if(firstSection && !firstSection.classList.contains('active')) {
          firstSection.classList.add('active');
          firstContent.classList.add('active');
        }
      }
    });
  </script>
    <nav class="mobile-nav">
      <a href="{{route('home')}}" class="nav-item">
        <i class="fas fa-th nav-icon"></i>
        <span>Shop</span>
      </a>
      <a href="#" class="nav-item">
        <i class="fas fa-search nav-icon"></i>
        <span>Search</span>
      </a>
      <a href="{{route('checkout')}}" class="nav-item">
        <i class="far fa-user nav-icon"></i>
        <span>Account</span>
      </a>
      <a href="{{route('wishlist')}}" class="nav-item">
        <i class="far fa-heart nav-icon"></i>
        <span>Wishlist</span>
        <span class="badge">{{Helper::wishlistCount()}}</span>
      </a>
      <a href="{{route('checkout')}}" class="nav-item">
        <i class="fas fa-shopping-cart nav-icon"></i>
        <span>Cart</span>
        <span class="badge">{{Helper::cartCount()}}</span>
      </a>
    </nav>


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
	<!-- <script src="{{asset('frontend/js/nicesellect.js')}}"></script> -->
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
            .hide(); 
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