
  <link rel="stylesheet" href="{{ asset('/css/header.css') }}">

  <script>
    function toggleMobileMenu() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('active');
    }
    function toggleMegaMenu() {
      const menu = document.getElementById('megaMenu');
      if (window.innerWidth <= 992) {
        menu.style.display = (menu.style.display === 'flex' || menu.style.display === 'block') ? 'none' : 'block';
      }
    }

    function toggleCategoryList() {
      const list = document.getElementById('mobileCategories');
        list.style.display = list.style.display === 'none' ? 'block' : 'none';
    }
    function toggleUserDropdown() {
      const menu = document.getElementById('userDropdown');
      menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    }
  </script>

  @php  $categorys = App\Models\Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get(); @endphp
  <header class="header">
      <div class="mobile-menu" id="mobileMenu">
          <div class="close-btn" onclick="toggleMobileMenu()">
              <i class="fas fa-times"></i>
          </div>
          <ul>
              <li><a href="{{url('/newarrival')}}">New Arrival</a></li>
              <li><a href="{{url('/bestseller')}}">Best Seller</a></li>
              <li class="category-toggle">
                <div class="category-header"  onclick="toggleCategoryList()">
                    <span>Categories</span>
                    <i class="fas fa-chevron-down"></i>
                </div>

                <div id="mobileCategories" class="category-list">
                    @foreach ($categorys as $category)
                        <div class="category-group">
                            <strong>{{ $category->title }}</strong>
                            <hr />
                            @foreach ($category->children as $child)
                                <a href="{{ route('category.details', $child->slug) }}">{{ $child->title }}</a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
              </li>
              <li><a href="{{route('collection')}}">Collections</a></li>
              <li><a href="{{url('/occasions')}}">Occasions</a></li>
              <li><a href="{{url('/gifting')}}">Gifting</a></li>
              <li><a href="{{route('contact')}}">Contact Us</a></li>
          </ul>

          <div class="icon-badge">
              <a href="{{route('wishlist')}}"><i class="fas fa-heart"></i> Wishlist</a>
          </div>
          <div class="icon-badge">
              <a href="#" onclick="openModal('searchModal')"><i class="fas fa-search"></i> Search</a>
          </div>
          <div class="help-section">
              <h4>Need help ?</h4>
              <p><strong>Address:</strong> 1234 Fashion Street, Suite 567,<br>New York, NY 10001</p>
              <p><strong>Email:</strong> <a href="mailto:info@fashionshop.com">info@fashionshop.com</a></p>
              <p><strong>Phone:</strong> <a href="tel:+12125551234">(212) 555–1234</a></p>
          </div>

          <div class="account-link">
            @if(auth()->check())
                  <a href="#"><i class="fas fa-user"></i> {{ auth()->user()->name }}</a>
              @else
                  <a href="#" onclick="openModal('loginModal')"><i class="fas fa-user"></i> Account</a>
              @endif
          </div>
      </div>
  
      <div class="top-bar">
            <div class="hamburger" onclick="toggleMobileMenu()">
              <i class="fas fa-bars"></i>
            </div>
            <div class="logo">
                <img src="{{asset('images/Sparsh_Logo.webp')}}" alt="Logo" class="logo-img" />
            </div>
          <div class="header-icons" @media (max-width: 768px) style="display: none;">
              <a href="#">
                <i class="fas fa-search"></i>
              </a>

              @if(auth()->check())
                  <div class="dropdown">
                      <a href="#" class="icon-badge dropdown-toggle" onclick="event.preventDefault(); toggleUserDropdown();">
                          <i class="fas fa-user"></i>
                      </a>
                      <div id="userDropdown" class="dropdown-menu">
                          <a href="#">{{ auth()->user()->name }}</a>
                          <a href="{{ url('/user') }}">Dashboard</a>
                          <a href="{{ route('user.logout') }}">Logout</a>
                      </div>
                  </div>
              @else
                  <a class="icon-badge" onclick="openModal('loginModal')">
                      <i class="fas fa-user"></i>
                  </a>
              @endif

              <a href="{{route('wishlist')}}" class="icon-badge">
                  <i class="fas fa-heart"></i>
                  <span class="badge">{{Helper::wishlistCount()}}</span>
              </a>

              <a id="cartToggle" class="icon-badge">
                  <i class="fas fa-shopping-bag"></i>
                  <span class="badge">{{Helper::cartCount()}}</span>
              </a>
          </div>
      </div>

      <nav class="nav" id="navMenu">
        <ul class="nav-list">
            <li><a href="{{route('home')}}"><strong>Home</strong></a></li>
            <li><a href="{{route('about-us')}}"><strong>About Us</strong></a></li>
            <li><a href="{{url('/newarrival')}}"><strong>New Arrival</strong></a></li>
            <li><a href="{{url('/bestseller')}}"><strong>Best Seller</strong></a></li>

            <li class="dropdown">
              <a href="javascript:void(0);" onclick="toggleMegaMenu()" class="dropdown-toggle">
                  <strong>Categories</strong>
              </a>
              <div class="mega-menu" id="megaMenu">
                  @foreach ($categorys as $category)
                      <div class="mega-column">
                          <h2><a href="{{ route('category.details', $category->slug) }}">
                              <strong>{{ $category->title }}</strong></a></h2>
                          @foreach ($category->children as $child)
                              <a href="{{ route('category.details', $child->slug) }}">{{ $child->title }}</a>
                          @endforeach
                      </div>
                  @endforeach
              </div>
          </li>

          <li><a href="{{route('collection')}}"><strong>Collections</strong></a></li>
          <li><a href="{{url('/occasions')}}"><strong>Occasions</strong></a></li>
          <li><a href="{{url('/gifting')}}"><strong>Gifting</strong></a></li>
          <li><a href="{{route('contact')}}"><strong>Contact Us</strong></a></li>
        </ul>
      </nav>
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
        <button><i class="fa fa-sticky-note-o" aria-hidden="true"></i></button>
        <button><i class='fas fa-shipping-fast'></i></button>
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
  function toggleUserDropdown() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
  }

  // Optional: Close on click outside
  document.addEventListener('click', function(e) {
    const dropdown = document.getElementById('userDropdown');
    const trigger = document.querySelector('.dropdown-toggle');
    if (!trigger.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.style.display = 'none';
    }
  });
</script>

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
              location.reload();
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

   