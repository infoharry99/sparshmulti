<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Artisan;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\FrontendApiController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\MessageApiController;
    use App\Http\Controllers\CartApiController;
    use App\Http\Controllers\WishlistApiController;
    use App\Http\Controllers\OrderApiController;
    use App\Http\Controllers\ProductReviewController;
    use App\Http\Controllers\PostCommentController;
    use App\Http\Controllers\CouponApiController;
    use App\Http\Controllers\PayPalController;
    use App\Http\Controllers\NotificationController;
    use App\Http\Controllers\HomeApiController;
    use \UniSharp\LaravelFilemanager\Lfm;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    // CACHE CLEAR ROUTE
    Route::get('cache-clear', function () {
        Artisan::call('optimize:clear');
        request()->session()->flash('success', 'Successfully cache cleared.');
        return redirect()->back();
    })->name('cache.clear');

    // Route::get('user/login', [FrontendApiController::class, 'login'])->name('login.form');
    Route::post('user/login', [FrontendApiController::class, 'loginSubmit'])->name('login.submit');
    Route::post('send/otp', [FrontendApiController::class, 'sendotp'])->name('send.otp');
    Route::post('otp/login', [FrontendApiController::class, 'otplogin'])->name('login.submit');
    Route::post('social/login', [FrontendApiController::class, 'sociallogin'])->name('social.login');
    Route::get('user/logout', [FrontendApiController::class, 'logout'])->name('user.logout');

    // Route::get('user/register', [FrontendApiController::class, 'register'])->name('register.form');
    Route::post('register', [FrontendApiController::class, 'registerSubmit'])->name('register.submit');
    
    // Reset password
    Route::post('password-reset', [FrontendApiController::class, 'showResetForm'])->name('password.reset');

    // Socialite
    Route::get('login/{provider}/', [LoginController::class, 'redirect'])->name('login.redirect');
    Route::get('login/{provider}/callback/', [LoginController::class, 'Callback'])->name('login.callback');

    Route::get('/home', [FrontendApiController::class, 'home'])->name('home');

// Frontend Routes
    Route::get('/about-us', [FrontendApiController::class, 'aboutUs'])->name('about-us');
    Route::get('/contact', [FrontendApiController::class, 'contact'])->name('contact');
    Route::post('/contact/message', [MessageApiController::class, 'store'])->name('contact.store');
    Route::get('product-detail/{slug}', [FrontendApiController::class, 'productDetail'])->name('product-detail');
    Route::post('/product/search', [FrontendApiController::class, 'productSearch'])->name('product.search');
    Route::get('/product-cat/{slug}', [FrontendApiController::class, 'productCat'])->name('product-cat');
    Route::get('/product-sub-cat/{slug}/{sub_slug}', [FrontendApiController::class, 'productSubCat'])->name('product-sub-cat');
    Route::get('/product-brand/{slug}', [FrontendApiController::class, 'productBrand'])->name('product-brand');
// Cart section
    // Route::get('/add-to-cart/{slug}', [CartApiController::class, 'singleAddToCart'])->name('add-to-cart');
    Route::post('/add-to-cart', [CartApiController::class, 'addToCart'])->name('single-add-to-cart');
    Route::post('cart-delete', [CartApiController::class, 'cartDelete'])->name('cart-delete');
    Route::post('cart-update', [CartApiController::class, 'cartUpdate'])->name('cart.update');
    Route::post('cart', [CartApiController::class, 'cart'])->name('cart');

    // Route::get('/cart', function () {
    //     return view('frontend.pages.cart');
    // })->name('cart');

    Route::get('/checkout', [CartApiController::class, 'checkout'])->name('checkout');
    // Wishlist
    Route::get('/wishlist', function () {
        return view('frontend.pages.wishlist');
    })->name('wishlist');
    Route::get('/wishlist/{slug}', [WishlistApiController::class, 'wishlist'])->name('add-to-wishlist');
    Route::get('wishlist-delete/{id}', [WishlistApiController::class, 'wishlistDelete'])->name('wishlist-delete');
    Route::post('cart/order', [OrderApiController::class, 'store'])->name('cart.order');
    Route::get('order/pdf/{id}', [OrderApiController::class, 'pdf'])->name('order.pdf');
    Route::get('/income', [OrderApiController::class, 'incomeChart'])->name('product.order.income');
    // Route::get('/user/chart',[AdminController::class, 'userPieChart'])->name('user.piechart');
    Route::get('/product-grids', [FrontendApiController::class, 'productGrids'])->name('product-grids');
    Route::get('/product-lists', [FrontendApiController::class, 'productLists'])->name('product-lists');
    Route::match(['get', 'post'], '/filter', [FrontendApiController::class, 'productFilter'])->name('shop.filter');
    // Order Track
    Route::get('/product/track', [OrderApiController::class, 'orderTrack'])->name('order.track');
    Route::post('product/track/order', [OrderApiController::class, 'productTrackOrder'])->name('product.track.order');
    // Blog
    Route::get('/blog', [FrontendApiController::class, 'blog'])->name('blog');
    Route::get('/blog-detail/{slug}', [FrontendApiController::class, 'blogDetail'])->name('blog.detail');
    Route::get('/blog/search', [FrontendApiController::class, 'blogSearch'])->name('blog.search');
    Route::post('/blog/filter', [FrontendApiController::class, 'blogFilter'])->name('blog.filter');
    Route::get('blog-cat/{slug}', [FrontendApiController::class, 'blogByCategory'])->name('blog.category');
    Route::get('blog-tag/{slug}', [FrontendApiController::class, 'blogByTag'])->name('blog.tag');
    // NewsLetter
    Route::post('/subscribe', [FrontendApiController::class, 'subscribe'])->name('subscribe');
   // Product Review
    Route::resource('/review', 'ProductReviewController');
    Route::post('product/{slug}/review', [ProductReviewController::class, 'store'])->name('review.store');
    // Post Comment
    Route::post('post/{slug}/comment', [PostCommentController::class, 'store'])->name('post-comment.store');
    Route::resource('/comment', 'PostCommentController');
    // Coupon
    Route::post('/coupon-store', [CouponApiController::class, 'couponStore'])->name('coupon-store');
    // Payment
    Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
    Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
    Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');
    Route::get('orderlist', [HomeApiController::class, 'orderIndex'])->name('orderlist');

    // User section start
    // Route::group(['prefix' => '/user', 'middleware' => ['user']], function () {
    //     Route::get('/', [HomeController::class, 'index'])->name('user');
    //     // Profile
    //     Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
    //     Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');
    //     //  Order
    //     // Route::get('/order', "HomeController@orderIndex")->name('user.order.index');
    //     Route::get('/order/show/{id}', "HomeController@orderShow")->name('user.order.show');
    //     Route::delete('/order/delete/{id}', [HomeController::class, 'userOrderDelete'])->name('user.order.delete');
    //     // Product Review
    //     Route::get('/user-review', [HomeController::class, 'productReviewIndex'])->name('user.productreview.index');
    //     Route::delete('/user-review/delete/{id}', [HomeController::class, 'productReviewDelete'])->name('user.productreview.delete');
    //     Route::get('/user-review/edit/{id}', [HomeController::class, 'productReviewEdit'])->name('user.productreview.edit');
    //     Route::patch('/user-review/update/{id}', [HomeController::class, 'productReviewUpdate'])->name('user.productreview.update');

    //     // Post comment
    //     Route::get('user-post/comment', [HomeController::class, 'userComment'])->name('user.post-comment.index');
    //     Route::delete('user-post/comment/delete/{id}', [HomeController::class, 'userCommentDelete'])->name('user.post-comment.delete');
    //     Route::get('user-post/comment/edit/{id}', [HomeController::class, 'userCommentEdit'])->name('user.post-comment.edit');
    //     Route::patch('user-post/comment/udpate/{id}', [HomeController::class, 'userCommentUpdate'])->name('user.post-comment.update');

    //     // Password Change
    //     Route::get('change-password', [HomeController::class, 'changePassword'])->name('user.change.password.form');
    //     Route::post('change-password', [HomeController::class, 'changPasswordStore'])->name('change.password');

    // });

    