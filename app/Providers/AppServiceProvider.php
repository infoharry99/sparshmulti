<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Scopes\TenantScope;
use App\Models\Tenant;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $domain = request()->getHost();
        $tenant = Tenant::where('domain', $domain)->first();
    
        if ($tenant) {
            TenantScope::setTenant($tenant->id);
        }
        Schema::defaultStringLength(191);
        App::setLocale(Session::get('locale', config('app.locale')));
        View::composer('*', function ($view) {
            $cartItems = [];
    
            if (auth()->check()) {
                $cartItems = \App\Models\Cart::with('product')->where('user_id', auth()->id())->whereNull('order_id')->get();
            } else {
                $sessionCart = session('cart', []);
                foreach ($sessionCart as $item) {
                    $product = \App\Models\Product::find($item['product_id']);
                    if ($product) {
                        $cartItems[] = (object)[
                            'product' => $product,
                            'quantity' => $item['quantity'],
                            'amount' => $item['amount'],
                        ];
                    }
                }
            }
    
            $view->with('cartItems', $cartItems);
        });
    }
}
