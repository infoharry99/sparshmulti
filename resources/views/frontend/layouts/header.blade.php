
<!-- <link rel="stylesheet" href="styles.css"> -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

        body {
            font-family: Arial, sans-serif;
        }

        .header {
            width: 100%;
            background: #fff;
            border-bottom: 1px solid #ddd;
            position: relative;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 240px;
            position: relative;
        }

        .nav {
            flex: 4;
        }

        .nav-list {
            display: flex;
            align-items: center;
            list-style: none;
            gap: 20px;
        }

        .nav-list li {
            position: relative;
        }

        .nav-list a {
            text-decoration: none;
            color: #000;
            font-weight: 500;
            padding: 8px 10px;
        }

        .logo {
            flex: 1;
            text-align: center;
        }

        .logo h1 {
            font-size: 32px;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 12px;
            color: #555;
        }

        .header-icons {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        .header-icons a {
            text-decoration: none;
            color: #000;
            font-size: 20px;
        }

        /* Mega Menu */
        .dropdown:hover .mega-menu {
            display: flex;
        }

        .mega-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            width: 800px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            gap: 30px;
            z-index: 999;
        }

        .mega-column {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .mega-column h4 {
            font-size: 16px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .mega-column a {
            font-size: 14px;
            margin-bottom: 8px;
            color: #333;
            text-decoration: none;
        }

        .mega-column a:hover {
                `text-decoration: underline;
        }

</style>

<header class="header">
    <div class="logo">
        <img src="{{asset('images/Sparsh_Logo.webp')}}" alt="Logo" style="width: 172px; height: auto;">
        <!-- <div class="header-icons">
            <a href="#">🔍</a>
            <a href="#">👤</a>
            <a href="#">❤️(0)</a>
            <a href="#">🛒(0)</a>
        </div> -->
    </div>
    <div class="header-container">
        <nav class="nav">
            <ul class="nav-list">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">New Arrival</a></li>
                <li><a href="#">Best Seller</a></li>
                
                <li class="dropdown">
                    <a href="#">Categories</a>
                    <div class="mega-menu">
                        <div class="mega-column">
                        <h4>Necklace Set</h4>
                        <a href="#">Designer Handmade Polki Necklace Set</a>
                        <a href="#">Designer Mala Set</a>
                        <a href="#">Low Price Necklace Set</a>
                        <a href="#">Paint Meena Necklace Set</a>
                        <a href="#">Polki Necklace Set</a>
                        </div>
                        <div class="mega-column">
                        <h4>Earrings</h4>
                        <a href="#">Fancy Earrings</a>
                        <a href="#">Indian Reverse Ad Jhumkas</a>
                        <a href="#">Mint Meena Earrings</a>
                        <a href="#">Polki Earrings</a>
                        <a href="#">Real Kundan Earrings</a>
                        <a href="#">Real Kundan Studs</a>
                        <a href="#">Studs</a>
                        </div>
                        <div class="mega-column">
                        <h4>Bangles</h4>
                        <a href="#">Cz Bangles</a>
                        <a href="#">Paint Meena Bangles</a>
                        <a href="#">Polki Bangles</a>
                        <a href="#">Real Kundan Bangles</a>
                        </div>
                        <div class="mega-column">
                        <h4>Payal</h4>
                        <a href="#">Kundan Payal</a>
                        <a href="#">Polki Payal</a>
                        </div>
                        <div class="mega-column">
                        <h4>Mangalsutra</h4>
                        </div>
                    </div>
                </li>
                
                <li><a href="#">Collections</a></li>
                <li><a href="#">Occasion</a></li>
                <li><a href="#">Gifting</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
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


