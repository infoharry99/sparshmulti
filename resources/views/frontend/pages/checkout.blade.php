
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            :root {
                --primary-color: #333;
                --accent-color: #2874f0;
                --light-bg: #f8f9fa;
                --border-color: #e1e1e1;
                --success-color: #28a745;
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            
            body {
                background-color: #f5f5f5;
                color: #333;
                line-height: 1.6;
            }
            
            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 50px;
                background-color: #fff;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                position: sticky;
                top: 0;
                z-index: 100;
            }
            
            .store-name {
                font-size: 24px;
                font-weight: bold;
                color: var(--primary-color);
                text-decoration: none;
            }
            
            .cart-icon {
                font-size: 24px;
                color: var(--primary-color);
                position: relative;
            }
            
            .cart-icon .badge {
                position: absolute;
                top: -8px;
                right: -8px;
                background-color: var(--accent-color);
                color: white;
                border-radius: 50%;
                width: 18px;
                height: 18px;
                font-size: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .container {
                max-width: 1200px;
                margin: 30px auto;
                padding: 0 15px;
                display: flex;
                flex-wrap: wrap;
            }
            @media (max-width: 768px) {
                .checkout-inner {
                    flex-direction: column;
                }
            }
            @media (max-width: 768px) {
                .checkout-inner {
                    flex-direction: column;
                }

                .checkout-summary {
                    width: 100%;
                }
            }
            .checkout-inner {
                display: flex;
                gap: 30px;
                align-items: flex-start;
                flex-wrap: wrap;
            }
            .checkout-container {
                display: flex;
                width: 100%;
                gap: 30px;
            }
            
            .checkout-form {
                flex: 1;
                background: #fff;
                border-radius: 8px;
                padding: 30px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            }
            
            .checkout-summary {
                width: 380px;
                background: #fff;
                border-radius: 8px;
                padding: 25px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.05);
                align-self: flex-start;
            }
            
            .section-title {
                font-size: 20px;
                font-weight: 600;
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 1px solid var(--border-color);
            }
            
            .account-info {
                background: #fff;
                border-radius: 8px;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            }
            
            .account-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 15px;
            }
            
            .account-title {
                font-size: 18px;
                font-weight: 500;
            }
            
            .account-toggle {
                color: var(--accent-color);
                cursor: pointer;
                font-size: 20px;
            }
            
            .account-details {
                margin-bottom: 10px;
            }
            
            .account-email {
                color: #666;
                margin-bottom: 10px;
            }
            
            .logout-link {
                color: var(--accent-color);
                text-decoration: none;
            }
            
            .logout-link:hover {
                text-decoration: underline;
            }
            
            .newsletter-checkbox {
                display: flex;
                align-items: center;
                margin-top: 15px;
            }
            
            .newsletter-checkbox input {
                margin-right: 10px;
            }
            
            .delivery-section {
                margin-top: 30px;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
            
            .form-group label {
                display: block;
                margin-bottom: 8px;
                font-weight: 500;
            }
            
            .form-control {
                width: 100%;
                padding: 12px 15px;
                border: 1px solid var(--border-color);
                border-radius: 4px;
                font-size: 15px;
                transition: border-color 0.3s;
            }
            
            .form-control:focus {
                border-color: var(--accent-color);
                outline: none;
            }
            
            .form-row {
                display: flex;
                gap: 20px;
            }
            
            .form-col {
                flex: 1;
            }
            
            .country-select {
                position: relative;
            }
            
            .country-select .form-control {
                padding-right: 30px;
                appearance: none;
                cursor: pointer;
            }
            
            .country-select::after {
                content: "▼";
                font-size: 12px;
                color: #666;
                position: absolute;
                right: 15px;
                top: 50%;
                transform: translateY(-50%);
                pointer-events: none;
            }
            
            .address-search {
                position: relative;
            }
            
            .search-icon {
                position: absolute;
                right: 15px;
                top: 50%;
                transform: translateY(-50%);
                color: #666;
            }
            
            .shipping-method {
                margin-top: 30px;
            }
            
            .shipping-placeholder {
                background-color: var(--light-bg);
                padding: 15px;
                border-radius: 4px;
                text-align: center;
                color: #666;
            }
            
            .product-list {
                margin-bottom: 25px;
            }
            
            .product-item {
                display: flex;
                margin-bottom: 15px;
                position: relative;
            }
            
            .product-image {
                width: 60px;
                height: 60px;
                border-radius: 5px;
                margin-right: 15px;
                overflow: hidden;
                position: relative;
            }
            
            .product-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .product-badge {
                position: absolute;
                top: -5px;
                right: -5px;
                background-color: var(--accent-color);
                color: white;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px;
            }
            
            .product-details {
                flex: 1;
            }
            
            .product-title {
                font-weight: 500;
                margin-bottom: 5px;
                font-size: 14px;
            }
            
            .product-price {
                font-weight: 600;
                color: var(--primary-color);
            }
            
            .checkout-summary-line {
                display: flex;
                justify-content: space-between;
                margin-bottom: 15px;
            }
            
            .checkout-total {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
                padding-top: 15px;
                border-top: 1px solid var(--border-color);
                font-weight: 600;
                font-size: 18px;
            }
            
            .shipping-info {
                margin: 15px 0;
                color: #666;
            }
            
            .currency {
                font-size: 14px;
                margin-right: 5px;
                color: #666;
            }
            
            @media (max-width: 992px) {
                .checkout-container {
                    flex-direction: column;
                }
                
                .checkout-summary {
                    width: 100%;
                    margin-top: 30px;
                }
            }
            
            @media (max-width: 768px) {
                header {
                    padding: 15px 20px;
                }
                
                .form-row {
                    flex-direction: column;
                    gap: 15px;
                }
            }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Store - Checkout</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('frontend/css/select2/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/nice-select/css/nice-select.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="#" class="store-name">My Store</a>
            <div class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge">{{ Helper::cartCount() }}</span>
            </div>
        </header>

        <div class="container">
            <div class="account-info">
                <div class="account-header">
                    <h3 class="account-title">Account</h3>
                    <i class="fas fa-chevron-up account-toggle"></i>
                </div>
                <div class="account-details" style="display: block;">
                    @if(auth()->check())
                        <p class="account-email">{{ auth()->user()->email }}</p>
                        <a href="{{ url('/user/logout') }}" class="logout-link">Log out</a>
                    @else
                        <a href="{{ url('/user/login') }}" class="login-link">Log in</a>
                    @endif
                </div>
                <div class="newsletter-checkbox">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter">Email me with news and offers</label>
                </div>
            </div>
           
            <div class="checkout-container"  style="display:flex">
                <form method="POST" action="{{ route('cart.order') }}">
                    @csrf
                    <div class="checkout-inner" style="display: flex; gap: 30px; align-items: flex-start;">
                        <!-- LEFT -->
                        <div class="checkout-form">
                            <h2 class="section-title">Delivery</h2>

                            <div class="form-group">
                                <label for="country">Country/Region</label>
                                <select id="country" name="country" class="form-control select2">
                                    <option value="UK">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="AU">Australia</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-col">
                                    <label>First Name *</label>
                                    <input type="text" name="first_name" class="form-control" value="{{ auth()->check() ? auth()->user()->first_name : old('first_name') }}">
                                    @error('first_name') 
                                    <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-col">
                                    <label>Last Name *</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ auth()->check() ? auth()->user()->last_name : old('last_name') }}">
                                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-col">
                                    <label>Email *</label>
                                    <input type="email" name="email" class="form-control" value="{{ auth()->check() ? auth()->user()->email : old('email') }}">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-col">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" class="form-control" value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address Line 1 *</label>
                                <input type="text" name="address1" class="form-control" value="{{ old('address1') }}">
                                @error('address1') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Address Line 2</label>
                                <input type="text" name="address2" class="form-control" value="{{ old('address2') }}">
                                @error('address2') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-col">
                                    <label>City *</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                                </div>
                                <div class="form-col">
                                    <label>Postal Code *</label>
                                    <input type="text" name="post_code" class="form-control" value="{{ old('post_code') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Shipping Method</label>
                                @if(count(Helper::shipping()) > 0 && Helper::cartCount() > 0)
                                    <select name="shipping" class="nice-select">
                                        <option value="">Select your address</option>
                                        @foreach(Helper::shipping() as $shipping)
                                            <option value="{{ $shipping->id }}" data-price="{{ $shipping->price }}">{{ $shipping->type }} - ₹{{ $shipping->price }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <p>Shipping not available</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Payment Method</label><br>
                                <input type="radio" name="payment_method" value="cod" checked> Cash on Delivery<br>
                                <!-- <input type="radio" name="payment_method" value="paypal"> PayPal -->
                            </div>

                            <div class="button">
                                <button type="submit" class="btn">Place Order</button>
                            </div>
                        </div>

                        <!-- RIGHT -->
                        <div class="checkout-summary">
                            <div class="product-list">
                                @foreach ($cartItems as $item)
                                    @php $photos = json_decode($item->product->photo); @endphp
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img src="{{ asset($photos[0]) }}" alt="{{ $item->product->title }}" width="60">
                                            <span class="product-badge">{{ $item->quantity }}</span>
                                        </div>
                                        <div class="product-details">
                                            <h4 class="product-title">{{ $item->product->title }}</h4>
                                            <p class="product-price">₹{{ number_format($item->amount, 2) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="checkout-summary-line">
                                <span>Subtotal · {{ Helper::cartCount() }} items</span>
                                <span>₹{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                            </div>

                            <div class="checkout-summary-line shipping-summary">
                                <span>Shipping</span>
                                <span>Enter shipping address</span>
                            </div>

                            <div class="checkout-total" id="order_total_price">
                                <span>Total</span>
                                <span>INR ₹{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          
        </div>

        <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
        <!-- <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script> -->

        <script>
            $(document).ready(function () {
                $('.select2').select2();
                $('.nice-select').niceSelect();

                $('.nice-select').change(function () {
                    let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
                    let subtotal = {{ Helper::totalCartPrice() }};
                    let total = subtotal + cost;
                    $('#order_total_price span:last-child').text('INR ₹' + total.toFixed(2));
                });
            });

            document.querySelector('.account-toggle').addEventListener('click', function () {
                const details = document.querySelector('.account-details');
                const icon = this;

                if (details.style.display === 'none') {
                    details.style.display = 'block';
                    icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
                } else {
                    details.style.display = 'none';
                    icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
                }
            });
        </script>
    </body>
</html>


    <!-- Start Checkout -->
    <!-- <section class="shop checkout section">
        <div class="container">
                <form class="form" method="POST" action="{{route('cart.order')}}">
                    @csrf
                    <div class="row"> 

                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>Make Your Checkout Here</h2>
                                <p>Please register in order to checkout more quickly</p>
-d
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>First Name<span>*</span></label>
                                            <input type="text" name="first_name" placeholder="" value="{{old('first_name')}}" value="{{old('first_name')}}">
                                            @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Last Name<span>*</span></label>
                                            <input type="text" name="last_name" placeholder="" value="{{old('lat_name')}}">
                                            @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email Address<span>*</span></label>
                                            <input type="email" name="email" placeholder="" value="{{old('email')}}">
                                            @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Phone Number <span>*</span></label>
                                            <input type="number" name="phone" placeholder="" required value="{{old('phone')}}">
                                            @error('phone')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Country<span>*</span></label>
                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Address Line 1<span>*</span></label>
                                            <input type="text" name="address1" placeholder="" value="{{old('address1')}}">
                                            @error('address1')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Address Line 2</label>
                                            <input type="text" name="address2" placeholder="" value="{{old('address2')}}">
                                            @error('address2')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="text" name="post_code" placeholder="" value="{{old('post_code')}}">
                                            @error('post_code')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="order-details">
                                <div class="single-widget">
                                    <h2>CART  TOTALS</h2>
                                    <div class="content">
                                        <ul>
										    <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Cart Subtotal<span>${{number_format(Helper::totalCartPrice(),2)}}</span></li>
                                            <li class="shipping">
                                                Shipping Cost
                                                @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                    <select name="shipping" class="nice-select">
                                                        <option value="">Select your address</option>
                                                        @foreach(Helper::shipping() as $shipping)
                                                        <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ${{$shipping->price}}</option>
                                                        @endforeach
                                                    </select>
                                                @else 
                                                    <span>Free</span>
                                                @endif
                                            </li>
                                            
                                            @if(session('coupon'))
                                            <li class="coupon_price" data-price="{{session('coupon')['value']}}">You Save<span>${{number_format(session('coupon')['value'],2)}}</span></li>
                                            @endif
                                            @php
                                                $total_amount=Helper::totalCartPrice();
                                                if(session('coupon')){
                                                    $total_amount=$total_amount-session('coupon')['value'];
                                                }
                                            @endphp
                                            @if(session('coupon'))
                                                <li class="last"  id="order_total_price">Total<span>${{number_format($total_amount,2)}}</span></li>
                                            @else
                                                <li class="last"  id="order_total_price">Total<span>${{number_format($total_amount,2)}}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-widget">
                                    <h2>Payments</h2>
                                    <div class="content">
                                        <div class="checkbox">
                                            {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                            <form-group>
                                                <input name="payment_method"  type="radio" value="cod"> <label> Cash On Delivery</label><br>
                                                <input name="payment_method"  type="radio" value="paypal"> <label> PayPal</label> 
                                            </form-group>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="single-widget payement">
                                    <div class="content">
                                        <img src="{{('backend/img/payment-method.png')}}" alt="#">
                                    </div>
                                </div>
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <button type="submit" class="btn">proceed to checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </section> -->
    <!--/ End Checkout -->
    
    <!-- Start Shop Services Area  -->
    <!-- <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">

                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End Shop Services -->
    
    <!-- Start Shop Newsletter  -->
    <!-- <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End Shop Newsletter -->

@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush