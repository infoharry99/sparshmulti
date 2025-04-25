{{-- <header class="header-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar  navbar-expand-lg navbar-light header-nav ">
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="img-fluid"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bar-icon"><div id="toggle">
                            <div class="one"></div>
                            <div class="two"></div>
                            <div class="three"></div>
                        </div></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product-listing.html">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        </ul>
                        <form>
                        <ul class="lang-list">
                            <li>
                                <select>
                                    <option>Language</option>
                                    <option>Hindi</option>
                                    <option>English</option>
                                </select>                          
                            </li>
                            <li><a href="">অস</a></li>
                            <li><a href="">EN</a></li>

                        </ul>
                        </form>
                        <ul class="e-com-list">
                            <li><a href="javascript:void(0)" class="search-btn"><img src="images/search.png" class="img-fluid"></a></li>
                            <li><a href="cart.html"><img src="images/cart.png" class="img-fluid"></a></li>
                            <li><a href="dashbord.html"><img src="images/profile.png" class="img-fluid"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header> --}}

<header class="main-header">
    
    {{-- <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <!-- Contact Info -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="top-left">
                        <ul class="list-inline mb-0">
                            @php $settings = DB::table('settings')->get(); @endphp
                            <li class="list-inline-item"><i class="ti-headphone-alt"></i> @foreach($settings as $data) {{$data->phone}} @endforeach</li>
                            <li class="list-inline-item"><i class="ti-email"></i> @foreach($settings as $data) {{$data->email}} @endforeach</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-12 text-end">
                    <div class="right-content">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><i class="ti-location-pin"></i> <a href="{{ route('order.track') }}">Track Order</a></li>
                            @auth
                                @if(Auth::user()->role === 'admin')
                                    <li class="list-inline-item"><i class="ti-user"></i> <a href="{{ route('admin') }}" target="_blank">Dashboard</a></li>
                                @else
                                    <li class="list-inline-item"><i class="ti-user"></i> <a href="{{ route('user') }}" target="_blank">Dashboard</a></li>
                                @endif
                                <li class="list-inline-item"><i class="ti-power-off"></i> <a href="{{ route('user.logout') }}">Logout</a></li>
                            @else
                                <li class="list-inline-item"><i class="ti-power-off"></i> 
                                    <a href="{{ route('login.form') }}">Login</a> / 
                                    <a href="{{ route('register.form') }}">Register</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="header-inner">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid me-2 logo-img">
                </a>
                <div class="collapse navbar-collapse justify-content-between">
                    <ul class="navbar-nav main-menu mx-auto">
                        <li class="nav-item {{ Request::path() == 'home' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">@lang('home.home')</a>
                        </li>
                        <li class="nav-item @if(Request::path() == 'product-grids' || Request::path() == 'product-lists') active @endif">
                            <a class="nav-link" href="{{ route('product-grids') }}">@lang('home.gallery')</a>
                        </li>
                        <li class="nav-item {{ Request::path() == 'about-us' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about-us') }}">@lang('home.about_us')</a>
                        </li>
                        <li class="nav-item {{ Request::path() == 'blog' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('blog') }}">@lang('home.blog')</a>
                        </li>
                        <li class="nav-item {{ Request::path() == 'contact' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact') }}">@lang('home.contact')</a>
                        </li>
                    </ul>

                    <!-- Tools -->
                    <div class="d-flex align-items-center">
                        <select class="form-select-sm me-2 lang-select" onchange="changeLanguage(this)"style="display: block;">
                            <option value="">@lang('home.language')</option>
                            <option value="hi" {{ app()->getLocale() == 'hi' ? 'selected' : '' }}>@lang('home.hindi')</option>
                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>@lang('home.english')</option>
                            <option value="bn" {{ app()->getLocale() == 'bn' ? 'selected' : '' }}>@lang('home.bengali')</option>
                        </select>

                        <!-- <a href="{{ url('lang/hi') }}" class="lang-code me-2 {{ app()->getLocale() == 'hi' ? 'fw-bold text-primary' : '' }}">HN</a>
                        <a href="{{ url('lang/en') }}" class="lang-code me-3 {{ app()->getLocale() == 'en' ? 'fw-bold text-primary' : '' }}">EN</a>
                        <a href="#">
                            <img src="{{ asset('images/search.png') }}" class="icon-img me-3" alt="Search">
                        </a> -->

                        <ul class="list-inline mb-0">
                            @auth
                                @if(Auth::user()->role === 'admin')
                                    <li class="list-inline-item"><i class="ti-user"></i> <a href="{{ route('admin') }}" target="_blank">@lang('home.dashboard')</a></li>
                                @else
                                    <a href="{{ route('cart') }}"><img src="{{ asset('images/cart.png') }}" class="icon-img me-3" alt="Cart"></a>
                                    <li class="list-inline-item"><i class="ti-user"></i> <a href="{{ route('user') }}" target="_blank">@lang('home.dashboard')</a></li>
                                @endif
                                <li class="list-inline-item"><i class="ti-power-off"></i> <a href="{{ route('user.logout') }}">@lang('home.logout')</a></li>
                            @else
                                <li class="list-inline-item"><i class="ti-power-off"></i>
                                    <a href="{{ route('login.form') }}">@lang('home.login')</a> / 
                                    <a href="{{ route('register.form') }}">@lang('home.register')</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>

<script>
    function changeLanguage(select) {
        const lang = select.value;
        if (lang) {
            window.location.href = `/lang/${lang}`;
        }
    }
</script>





<!-- <header class="header shop">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="top-left">
                        <ul class="list-main">
                            @php
                                $settings=DB::table('settings')->get();
                                
                            @endphp
                            <li><i class="ti-headphone-alt"></i>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
                            <li><i class="ti-email"></i> @foreach($settings as $data) {{$data->email}} @endforeach</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="right-content">
                        <ul class="list-main">
                        <li><i class="ti-location-pin"></i> <a href="{{route('order.track')}}">Track Order</a></li>
                            {{-- <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> --}}
                            @auth 
                                @if(Auth::user()->role=='admin')
                                    <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">Dashboard</a></li>
                                @else 
                                    <li><i class="ti-user"></i> <a href="{{route('user')}}"  target="_blank">Dashboard</a></li>
                                @endif
                                <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">Logout</a></li>

                            @else
                                <li><i class="ti-power-off"></i><a href="{{route('login.form')}}">Login /</a> <a href="{{route('register.form')}}">Register</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-inner">
       
    </div>
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner">	
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">Home</a></li>
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">About Us</a></li>
                                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">Products</a><span class="new">New</span></li>												
                                                {{Helper::getHeaderCategory()}}
                                            <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">Blog</a></li>									
                                               
                                            <li class="{{Request::path()=='contact' ? 'active' : ''}}">
                                                <a href="{{route('contact')}}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> -->


