
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="/frontend/css/responstive.css">
    <title>LOGIN || Register</title>
</head>
<body id="inner-page">

<!-- header sec start -->
<div class="blog-header">
    <a href="{{url('/')}}">Back to Home</a>
</div>
<!-- header sec end -->


    <!-- signup sec start -->
    <section class="signup-sec padding-bottom sectionhalftop">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-lg-5 text-center">
    				<div class="signup-area">
    					<h3>Register</h3>
    				    <!-- <ul class="login-battns">
    				    	<li><a href="#"><img src="{{asset('images/google-icon.png')}}" class="img-fluid">Sign in with Google</a></li>
    				    	<li><a href=""><img src="{{asset('images/Masked fb.png')}}">Sign in with Facebook</a></li>
    				    	<li><a href=""><img src="{{asset('images/Masked Icon.png')}}" class="img-fluid">Sign in with Apple</a></li>
    				    </ul>
    				    <div class="divider">or</div> -->
    				    <!-- <form class=""> -->
                        <form class="form signup-form" method="post" action="{{route('register.submit')}}">
                            @csrf
                            <input type="text" name="first_name" placeholder="First Name" required="required" value="{{old('first_name')}}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            <input type="text" name="last_name" placeholder="Last Name" required="required" value="{{old('last_name')}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="text" name="email" placeholder="Email Address" required="required" value="{{old('email')}}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            <input type="password" name="password" placeholder="Password" required="required" value="{{old('password')}}">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <button class="btn signup-btn" type="submit">Register</button>
    				    	<p>Already have an account?<a href="{{ route('login.form') }}">Log In</a></p>
    				    </form>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <!-- signup sec end -->










    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init();
      </script>

</body>
</html>