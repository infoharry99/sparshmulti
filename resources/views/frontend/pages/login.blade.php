
<style>
    /*====== signup sec start =======*/
    .signup-area h3 {
        color: #000;
        font-family: poppins;
        font-size: 37px;
        font-weight: 600;
    }
    .signup-area p {
        font-size: 18px;
        font-family: poppins;
        color: #000;
    }
    .login-battns{
        display: flex;
        flex-direction: column;
        list-style: none;
        gap: 25px;
        margin: 0;
        margin-top: 30px;
        padding: 0;
    }
    .login-battns li a{
        color: #000;
        font-family: poppins;
        font-size: 18px;
        width: 100%;
        display: inline-block;
        padding: 8px;
        border: 2px solid #ddd;
        text-align: center;
        border-radius: 44px;
    }
    .login-battns li a img{
        margin-right: 6px;
    }
    .divider{
        position: relative;
        width: 100%;
        color: #ddd;
        font-family: poppins;
        font-size: 18px;
        margin:30px 0;
    }
    .divider::before{
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        width: 40%;
        height: 1px;
        transform: translateY(-50%);
        background: #ddd;

    }
    .divider::after{
        content: "";
        position: absolute;
        top: 50%;
        right: 0;
        width: 40%;
        height: 1px;
        transform: translateY(-50%);
        background: #ddd;
    }
    .signup-form{
        width: 100%;
    }
    .signup-form input {
        padding: 13px;
        background: transparent;
        outline: none;
        font-family: poppins;
        color: #000000;;
        font-size: 18px;
        border: 2px solid #ddd;
        border-radius: 44px;
        margin-bottom: 25px;
        text-align: center;
        width: 100%;
    }
    .signup-form input::placeholder{
        color: #000000;
    }
    .signup-btn {
        background: black;
        font-size: 18px;
        color: #fff;
        font-family: poppins;
        padding: 14px;
        border-radius: 44px;
        width: 100%;
        border: none;
    }
    .signup-form p{
        margin-bottom: 0;
        margin-top: 15px;
        color: #000;
        font-family: poppins;
        font-size: 18px;
        color: #000;
    }
    .signup-form p a{
        color: var(--sdcolor);
        font-size: 18px;
        font-weight: 600;
        font-family: poppins;
    }
</style>
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
    <title>Login || Register</title>
</head>
<body id="inner-page">
<div class="blog-header">
    <a href="{{url('/')}}"> Back to Home</a>
</div>
    <!-- signup sec start -->
    <section class="signup-sec padding-bottom sectionhalftop">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-lg-5 text-center">
    				<div class="signup-area">
    					<h3>Log In </h3>
    				    <!-- <p>Enter your credentials to access your account</p> -->
    				    <!-- <ul class="login-battns">
    				    	<li><a href="#"><img src="{{asset('images/google-icon.png')}}" class="img-fluid">Sign in with Google</a></li>
    				    	<li><a href=""><img src="{{asset('images/Masked fb.png')}}">Sign in with Facebook</a></li>
    				    	<li><a href=""><img src="{{asset('images/Masked Icon.png')}}" class="img-fluid">Sign in with Apple</a></li>
    				    </ul>
    				    <div class="divider">or</div>
    				    <form class=""> -->
                        <form class="form signup-form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <!-- <label>Email<span></span></label> -->
                            <input type="email" name="email" placeholder="Write Your Email" required="required" value="{{old('email')}}">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
    				    	<!-- <label> Password<span></span></label> -->
                            <input type="password" name="password" placeholder="Enter Your Password" required="required" value="{{old('password')}}">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <!-- @if (Route::has('password.request'))
                                <a class="lost-pass" href="{{ route('password.reset') }}">
                                    Forgot your password?
                                </a>
                            @endif -->
                            <button class="btn signup-btn" type="submit">Log in</button>
    				    	<p>New customer?<a href="{{ route('register.form') }}">Create your account</a></p>
                           
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
    <script src="{{asset('js/jquery.ripples.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>  
    <script>
        AOS.init();
      </script>

</body>
</html>