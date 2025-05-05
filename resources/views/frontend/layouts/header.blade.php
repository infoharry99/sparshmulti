
<!-- <link rel="stylesheet" href="styles.css"> -->
<style>
      /* Modal Background */
    .modal-overlay {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(0,0,0,0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    /* Modal Box */
    .modal {
      width: 613px !important;
      background-color: #fff;
      /* width: 500px; */
      max-width: 90%;
      padding: 2.5rem;
      height:72% !important;
      border-radius: 6px;
      position: relative;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .modal h2 {
      margin-top: 0;
      font-size: 28px;
    }

    .modal input {
      width: 100%;
      padding: 0.75rem;
      margin-top: 1rem;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .modal a {
      display: inline-block;
      margin-top: 0.75rem;
      font-size: 0.9rem;
      text-decoration: none;
      color: #222;
    }

    .modal a:hover {
      text-decoration: underline;
    }

    .modal button {
      margin-top: 1.5rem;
      padding: 0.75rem;
      width: 100%;
      border: none;
      background-color: #000;
      color: white;
      font-weight: bold;
      border-radius: 4px;
      cursor: pointer;
    }

    .modal .switch-link {
      margin-top: 1rem;
      text-align: center;
      font-size: 0.95rem;
    }

    .close-btn {
      position: absolute;
      top: 1rem;
      right: 1rem;
      font-size: 20px;
      cursor: pointer;
    }
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
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 15px;
        position: relative;
        margin-right: 30px;
      }

      .icon-badge {
          position: relative;
          display: inline-block;
          color: #000;
          font-size: 20px;
      }

      .icon-badge .badge {
          position: absolute;
          top: -6px;
          right: -8px;
          background: red;
          color: white;
          font-size: 10px;
          padding: 2px 5px;
          border-radius: 50%;
          font-weight: bold;
      }

      /* Mega Menu */
      .dropdown:hover .mega-menu {
          display: flex;
      }

      .mega-menu {
          display: none;
          position: absolute;
          top: 103% !important;
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
    .sticky {
        display: block !important;
    }
</style>
@php  $categorys = App\Models\Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get(); @endphp
<header class="header">
    <div class="logo">
          <div>
            <img src="{{asset('images/Sparsh_Logo.webp')}}" alt="Logo" style="width: 172px; height: auto;">
          </div>
          <div class="header-icons">
              <a href="#"><i class="fas fa-search"></i></a>
              <a  class="icon-badge" onclick="openModal('loginModal')"><i class="fas fa-user"></i></a>
              <a href="#" class="icon-badge">
                <i class="fas fa-heart"></i>
                <span class="badge">{{Helper::wishlistCount()}}</span>
              </a>
              <a id="cartToggle"  class="icon-badge">
                <i class="fas fa-shopping-bag"></i>
                <span class="badge">{{Helper::cartCount()}}</span>
              </a>
          </div>
    </div>
    <div class="header-container">
        <nav class="nav">
            <ul class="nav-list">
                <li><a href="#">Home</a></li>
                <li><a href="{{route('about-us')}}">About Us</a></li>
                <li><a href="#">New Arrival</a></li>
                <li><a href="#">Best Seller</a></li>
                
                <li class="dropdown">
                    <a href="#">Categories</a>
                    <div class="mega-menu">
                      @foreach ($categorys as $category)
                          <div class="mega-column">
                              <h2><a href="{{ route('category.details', $category->slug) }}"><strong>{{ $category->title }}</strong></a></h2>
                              @foreach ($category->children as $child)
                                  <a href="{{ route('category.details', $child->slug) }}">{{ $child->title }}</a>
                              @endforeach
                          </div>
                      @endforeach
                  </div>
                </li>
                
                <li><a href="#">Collections</a></li>
                <li><a href="#">Occasion</a></li>
                <li><a href="#">Gifting</a></li>
                <li><a href="{{route('contact')}}">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="cart-drawer" id="cartDrawer">
  <div class="cart-header">
    <h2>Shopping cart</h2>
    <button id="cartClose" class="close-btn">×</button>
  </div>

  <div class="modal-overlay" id="modalOverlay">
        <!-- Login Modal -->
        <div class="modal" id="loginModal">
            <span class="close-btn" onclick="closeModal()">×</span>
            <h2>Log in</h2>
            <form class="form" method="post" action="{{route('login.submit')}}">
              @csrf
              <input type="email" name="email" placeholder="Email *" />
              <input type="password" name="password" placeholder="Password *" />
              <a href="#">Forgot your password?</a>
              <button>Log in</button>
            </form>
            <div class="switch-link">
            New customer? <a href="#" onclick="switchModal('registerModal')">Create your account</a>
            </div>
        </div>

        <!-- Register Modal -->
        <div class="modal" id="registerModal" style="display: none;">
            <span class="close-btn" onclick="closeModal()">×</span>
            <h2>Register</h2>
              <form class="form" method="post" action="{{route('register.submit')}}">
                @csrf
                <input type="text" name="first_name" placeholder="First Name *" />
                <input type="text" name="last_name" placeholder="Last Name *" />
                <input type="email" name="email" placeholder="Email *" />
                <input type="password"  name="password" placeholder="Password *" />
                <button class="btn" type="submit">Register</button>
              </form>
            <div class="switch-link">
            Already have an account? <a href="#" onclick="switchModal('loginModal')">Log in</a>
            </div>
        </div>

    </div>
      <div class="cart-items">
      @forelse ($cartItems as $item)
   
        <div class="cart-item">
          @php
              $photos = json_decode($item->product->photo);
          @endphp
            <img src="{{ asset($photos[0]) }}" alt="{{ $item->product->title }}">
            <div class="item-details">
                <h4>{{ $item->product->title }}</h4>
                <p>Rs. {{ number_format($item->product->price, 2) }}</p>
                <div class="qty-remove">
                  <button onclick="updateCart({{ $item->product->id }}, 'decrease')">-</button>
                  <span id="qty-{{ $item->product->id }}">{{ $item->quantity }}</span>
                  <button onclick="updateCart({{ $item->product->id }}, 'increase')">+</button>
                  <a href="{{ route('cart.remove', $item->product->id) }}">Remove</a>
                </div>
            </div>
        </div>
      @empty
    <p>Your cart is empty.</p>
  @endforelse
</div>

  <div class="cart-footer">
    <div class="icons">
      <button>✏️</button>
      <button>🚚</button>
    </div>

    @php
      $subtotal = collect($cartItems)->sum('amount');
    @endphp

    <div class="subtotal">
      <span>Subtotal</span>
      <strong>Rs. {{ number_format($subtotal, 2) }}</strong>
    </div>
    <p class="note">Tax included and shipping calculated at checkout</p>

    <label class="terms">
      <input type="checkbox"> I agree with the <a href="#">terms and conditions</a>
    </label>

   
    <div class="cart-actions">
      <button class="outline" ><a href="{{route('checkout')}}">View cart </a></button>
      <button class="filled" ><a href="{{route('checkout')}}">Check out</a></button>
    </div>

  </div>
</div>

<script>
function updateCart(productId, action) {
    fetch("{{ route('cart.updated') }}", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ product_id: productId, action: action })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            location.reload(); // Or update the cart DOM without reloading
        }
    });
}
</script>

<style>

.cart-icon {
  position: fixed;
  top: 20px;
  right: 20px;
  font-size: 24px;
  padding: 10px;
  cursor: pointer;
  z-index: 1001;
}

.cart-drawer {
  position: fixed;
  top: 0;
  right: -100%;
  width: 400px;
  height: 100%;
  background: #fff;
  box-shadow: -2px 0 10px rgba(0,0,0,0.2);
  transition: right 0.3s ease-in-out;
  z-index: 1000;
  display: flex;
  flex-direction: column;
}

.cart-drawer.open {
  right: 0;
}

.cart-header {
  display: flex;
  justify-content: space-between;
  padding: 20px;
  border-bottom: 1px solid #eee;
}

.cart-header h2 {
  margin: 0;
  font-size: 20px;
}

.close-btn {
  font-size: 28px;
  background: none;
  border: none;
  cursor: pointer;
}

.cart-items {
  flex-grow: 1;
  overflow-y: auto;
  padding: 20px;
}

.cart-item {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

.cart-item img {
  width: 60px;
  height: 60px;
  object-fit: cover;
  border-radius: 4px;
}

.item-details h4 {
  margin: 0;
  font-size: 14px;
}

.item-details p {
  margin: 5px 0;
  font-weight: bold;
}

.qty-remove {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
}

.qty-remove button {
  padding: 2px 8px;
}

.qty-remove a {
  color: #444;
  text-decoration: underline;
  cursor: pointer;
  font-size: 13px;
}

.cart-footer {
  padding: 20px;
  border-top: 1px solid #eee;
  background: #fafafa;
}

.icons {
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
}

.icons button {
  background: #fff;
  border: 1px solid #ccc;
  padding: 10px;
  font-size: 18px;
  border-radius: 6px;
  cursor: pointer;
}

.subtotal {
  display: flex;
  justify-content: space-between;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
}

.note {
  font-size: 12px;
  color: #777;
  margin-bottom: 10px;
}

.terms {
  font-size: 13px;
  display: block;
  margin-bottom: 20px;
}

.terms input {
  margin-right: 5px;
}

.cart-actions {
  display: flex;
  gap: 10px;
}

.cart-actions button {
  flex: 1;
  padding: 10px;
  font-size: 14px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

.cart-actions .outline {
  border: 1px solid #000;
  background: #fff;
}

.cart-actions .filled {
  background: #000;
  color: #fff;
}
</style>
<script>

    const cartToggle = document.getElementById("cartToggle");
    const cartDrawer = document.getElementById("cartDrawer");
    const cartClose = document.getElementById("cartClose");

    cartToggle.addEventListener("click", () => {
    cartDrawer.classList.add("open");
    });

    cartClose.addEventListener("click", () => {
    cartDrawer.classList.remove("open");
    });

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

<script>
  function openModal(modalId) {
    document.getElementById('modalOverlay').style.display = 'flex';
    document.getElementById('loginModal').style.display = 'none';
    document.getElementById('registerModal').style.display = 'none';
    document.getElementById(modalId).style.display = 'block';
  }

  function closeModal() {
    document.getElementById('modalOverlay').style.display = 'none';
  }

  function switchModal(toShow) {
    document.getElementById('loginModal').style.display = toShow === 'loginModal' ? 'block' : 'none';
    document.getElementById('registerModal').style.display = toShow === 'registerModal' ? 'block' : 'none';
  }
</script>
