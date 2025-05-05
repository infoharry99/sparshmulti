<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Artisan;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\FrontendController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\MessageController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\WishlistController;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\ProductReviewController;
    use App\Http\Controllers\PostCommentController;
    use App\Http\Controllers\CouponController;
    use App\Http\Controllers\PayPalController;
    use App\Http\Controllers\NotificationController;
    use App\Http\Controllers\HomeController;
    use \UniSharp\LaravelFilemanager\Lfm;

    // CACHE CLEAR ROUTE

    Route::get('lang/{lang}', function ($lang) {
        session(['locale' => $lang]);
        app()->setLocale($lang);
        return redirect()->back();
    });
    Route::get('/check-locale', function () {
        return session('locale');
    });
    Route::get('cache-clear', function () {
        Artisan::call('optimize:clear');
        request()->session()->flash('success', 'Successfully cache cleared.');
        return redirect()->back();
    })->name('cache.clear');
    // Route::group(['prefix' => 'translations', 'middleware' => ['web', 'auth']], function () {
    //     Route::get('/', [\Barryvdh\TranslationManager\Controller::class, 'index']);
    //     Route::post('import', [\Barryvdh\TranslationManager\Controller::class, 'postImport']);
    //     Route::post('find', [\Barryvdh\TranslationManager\Controller::class, 'postFind']);
    //     Route::post('add', [\Barryvdh\TranslationManager\Controller::class, 'postAdd']);
    //     Route::post('edit', [\Barryvdh\TranslationManager\Controller::class, 'postEdit']);
    //     Route::post('delete', [\Barryvdh\TranslationManager\Controller::class, 'postDelete']);
    //     Route::post('publish', [\Barryvdh\TranslationManager\Controller::class, 'postPublish']);
    // });
    
    // STORAGE LINKED ROUTE
    Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('storage-link',[AdminController::class,'storageLink'])->name('storage.link');
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.updated');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/category/{slug}', [FrontendController::class, 'show'])->name('category.details');
    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');

    Auth::routes(['register' => false]);
    // Route::group(['middleware' => ['language']], function (){
            Route::get('user/login', [FrontendController::class, 'login'])->name('login.form');
            Route::post('user/login', [FrontendController::class, 'loginSubmit'])->name('login.submit');
            Route::get('user/logout', [FrontendController::class, 'logout'])->name('user.logout');

            Route::get('user/register', [FrontendController::class, 'register'])->name('register.form');
            Route::post('user/register', [FrontendController::class, 'registerSubmit'])->name('register.submit');
        // Reset password
            Route::post('password-reset', [FrontendController::class, 'showResetForm'])->name('password.reset');
        // Socialite
            Route::get('login/{provider}/', [LoginController::class, 'redirect'])->name('login.redirect');
            Route::get('login/{provider}/callback/', [LoginController::class, 'Callback'])->name('login.callback');

            Route::get('/', [FrontendController::class, 'home'])->name('home');
        // product-play
        // Frontend Routes
            Route::get('/home', [FrontendController::class, 'index']);
            Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
            Route::get('/terms', [FrontendController::class, 'terms'])->name('terms');
            Route::get('/privacy', [FrontendController::class, 'privacy'])->name('privacy');
            Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
            Route::post('/contact/message', [MessageController::class, 'store'])->name('contact.store');
            Route::get('product-detail/{slug}', [FrontendController::class, 'productDetail'])->name('product-detail');
            //
            Route::get('product-play/{slug}', [FrontendController::class, 'productPlay'])->name('product-play');
        //
            Route::post('/product/search', [FrontendController::class, 'productSearch'])->name('product.search');
            Route::get('/product-cat/{slug}', [FrontendController::class, 'productCat'])->name('product-cat');
            Route::get('/product-sub-cat/{slug}/{sub_slug}', [FrontendController::class, 'productSubCat'])->name('product-sub-cat');
            Route::get('/product-brand/{slug}', [FrontendController::class, 'productBrand'])->name('product-brand');
        // Cart section
            // Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('user');
            Route::post('/add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart')->middleware('user');
            Route::get('cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart-delete');
            Route::post('cart-update', [CartController::class, 'cartUpdate'])->name('cart.update');

            Route::get('/cart', function () {
                return view('frontend.pages.cart');
            })->name('cart');

    
            Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
        // Wishlist
            Route::get('/wishlist', function () {
                return view('frontend.pages.wishlist');
            })->name('wishlist');
            Route::get('/wishlist/{slug}', [WishlistController::class, 'wishlist'])->name('add-to-wishlist');
            Route::get('wishlist-delete/{id}', [WishlistController::class, 'wishlistDelete'])->name('wishlist-delete');
            // Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');
            Route::get('order/pdf/{id}', [OrderController::class, 'pdf'])->name('order.pdf');
            Route::get('/income', [OrderController::class, 'incomeChart'])->name('product.order.income');
        // Route::get('/user/chart',[AdminController::class, 'userPieChart'])->name('user.piechart');
            Route::get('/product-grids', [FrontendController::class, 'productGrids'])->name('product-grids');
            Route::get('/product-lists', [FrontendController::class, 'productLists'])->name('product-lists');
            Route::match(['get', 'post'], '/filter', [FrontendController::class, 'productFilter'])->name('shop.filter');
        // Order Track
            Route::get('/product/track', [OrderController::class, 'orderTrack'])->name('order.track');
            Route::post('product/track/order', [OrderController::class, 'productTrackOrder'])->name('product.track.order');
        // Blog
            Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
            Route::get('/blog-detail/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
            Route::get('/blog/search', [FrontendController::class, 'blogSearch'])->name('blog.search');
            Route::post('/blog/filter', [FrontendController::class, 'blogFilter'])->name('blog.filter');
            Route::get('blog-cat/{slug}', [FrontendController::class, 'blogByCategory'])->name('blog.category');
            Route::get('blog-tag/{slug}', [FrontendController::class, 'blogByTag'])->name('blog.tag');

        // NewsLetter
            Route::post('/subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');

        // Product Review
            Route::resource('/review', 'ProductReviewController');
            Route::post('product/{slug}/review', [ProductReviewController::class, 'store'])->name('review.store');

        // Post Comment
            Route::post('post/{slug}/comment', [PostCommentController::class, 'store'])->name('post-comment.store');
            Route::resource('/comment', 'PostCommentController');
        // Coupon
            Route::post('/coupon-store', [CouponController::class, 'couponStore'])->name('coupon-store');
        // Payment
            Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
            Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
            Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');


// Backend section start

    Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/file-manager', function () {
            return view('backend.layouts.file-manager');
        })->name('file-manager');
        // user route
        Route::resource('users', 'UsersController');
        // Banner
        Route::resource('banner', 'BannerController');
        // Brand
        Route::resource('brand', 'BrandController');
        Route::resource('/terms', 'TermsController');
        Route::resource('/about', 'AboutusController');
        // Profile
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin-profile');
        Route::post('/profile/{id}', [AdminController::class, 'profileUpdate'])->name('profile-update');
        // Category
        Route::resource('/category', 'CategoryController');
        // Product
        Route::resource('/product', 'ProductController');
        // Ajax for sub category
        Route::post('/category/{id}/child', 'CategoryController@getChildByParent');
        // POST category
        Route::resource('/post-category', 'PostCategoryController');
        // Post tag
        Route::resource('/post-tag', 'PostTagController');
        // Post
        Route::resource('/post', 'PostController');
        // Message
        Route::resource('/message', 'MessageController');
        Route::get('/message/five', [MessageController::class, 'messageFive'])->name('messages.five');

        // Order
        Route::resource('/order', 'OrderController');
        // Shipping
        Route::resource('/shipping', 'ShippingController');
        // Coupon
        Route::resource('/coupon', 'CouponController');
        // Settings
        Route::get('settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('setting/update', [AdminController::class, 'settingsUpdate'])->name('settings.update');

        // Notification
        Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('admin.notification');
        Route::get('/notifications', [NotificationController::class, 'index'])->name('all.notification');
        Route::delete('/notification/{id}', [NotificationController::class, 'delete'])->name('notification.delete');
        // Password Change
        Route::get('change-password', [AdminController::class, 'changePassword'])->name('change.password.form');
        Route::post('change-password', [AdminController::class, 'changPasswordStore'])->name('change.password');
    });


// User section start
    Route::group(['prefix' => '/user', 'middleware' => ['user']], function () {
        Route::get('/', [HomeController::class, 'index'])->name('user');
        // Profile
        Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
        Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');
        //  Order
        Route::get('/order', "HomeController@orderIndex")->name('user.order.index');
        Route::get('/order/show/{id}', "HomeController@orderShow")->name('user.order.show');
        Route::delete('/order/delete/{id}', [HomeController::class, 'userOrderDelete'])->name('user.order.delete');
        // Product Review
        Route::get('/user-review', [HomeController::class, 'productReviewIndex'])->name('user.productreview.index');
        Route::delete('/user-review/delete/{id}', [HomeController::class, 'productReviewDelete'])->name('user.productreview.delete');
        Route::get('/user-review/edit/{id}', [HomeController::class, 'productReviewEdit'])->name('user.productreview.edit');
        Route::patch('/user-review/update/{id}', [HomeController::class, 'productReviewUpdate'])->name('user.productreview.update');

        // Post comment
        Route::get('user-post/comment', [HomeController::class, 'userComment'])->name('user.post-comment.index');
        Route::delete('user-post/comment/delete/{id}', [HomeController::class, 'userCommentDelete'])->name('user.post-comment.delete');
        Route::get('user-post/comment/edit/{id}', [HomeController::class, 'userCommentEdit'])->name('user.post-comment.edit');
        Route::patch('user-post/comment/udpate/{id}', [HomeController::class, 'userCommentUpdate'])->name('user.post-comment.update');

        // Password Change
        Route::get('change-password', [HomeController::class, 'changePassword'])->name('user.change.password.form');
        Route::post('change-password', [HomeController::class, 'changPasswordStore'])->name('change.password');

    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        Lfm::routes();
    });
