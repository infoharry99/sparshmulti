{{-- @extends('frontend.layouts.master')

@section('title','E-Shop || Login Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Shop Login -->
    <section class="shop login section">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Login</h2>
                        <p>Please register in order to checkout more quickly</p>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Email<span>*</span></label>
                                        <input type="email" name="email" placeholder="" required="required" value="{{old('email')}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Password<span>*</span></label>
                                        <input type="password" name="password" placeholder="" required="required" value="{{old('password')}}">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">Login</button>
                                        <a href="{{route('register.form')}}" class="btn">Register</a>
                                        OR
                                        <a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                                        <a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>
                                        <a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>

                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Remember me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="lost-pass" href="{{ route('password.reset') }}">
                                            Lost your password?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Login -->
@endsection
@push('styles')
<style>
    .shop.login .form .btn{
        margin-right:0;
    }
    .btn-facebook{
        background:#39579A;
    }
    .btn-facebook:hover{
        background:#073088 !important;
    }
    .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    .btn-google{
        background:#ea4335;
        color:white;
    }
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
    }
</style>
@endpush --}}



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
    color: #ddd;
    font-size: 18px;
    border: 2px solid #ddd;
    border-radius: 44px;
    margin-bottom: 25px;
    text-align: center;
    width: 100%;
}
.signup-form input::placeholder{
    color: #ddd;
}
.signup-btn {
    background: var(--sdcolor) ;
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
    <title>Melody Brush</title>
</head>
<body id="inner-page">

<!-- header sec start -->
<div class="blog-header">
    <a href="#"><img src="{{asset('images/x.png')}}" class="img-fluid"></a>
</div>
<!-- header sec end -->
   



    <!-- signup sec start -->
    <section class="signup-sec padding-bottom sectionhalftop">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-lg-5 text-center">
    				<div class="signup-area">
    					<h3>Sign In to Your Account</h3>
    				    <p>Enter your credentials to access your account</p>
    				    <ul class="login-battns">
    				    	<li><a href="#"><img src="{{asset('images/google-icon.png')}}" class="img-fluid">Sign in with Google</a></li>
    				    	<li><a href=""><img src="{{asset('images/Masked fb.png')}}">Sign in with Facebook</a></li>
    				    	<li><a href=""><img src="{{asset('images/Masked Icon.png')}}" class="img-fluid">Sign in with Apple</a></li>
    				    </ul>
    				    <div class="divider">or</div>
    				    <form class="signup-form">
    				    	<input type="text" placeholder="Email Address" name="">
    				    	<input type="text" placeholder="Password" name="">
    				    	<button class="signup-btn">Sign Up</button>
    				    	<p>Already Have an Account? <a href="#">Sign Up</a></p>
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