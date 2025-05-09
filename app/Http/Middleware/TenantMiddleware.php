<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Scopes\TenantScope;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // $host = $request->getHost(); // e.g., vendor1.com
        // dd($host);   
        $host = "127.0.0.1"; // e.g., vendor1.com
        $tenant = \App\Models\Tenant::where('domain', $host)->first();

        if (!$tenant) {
            abort(404, 'Vendor not found');
        }

        // Share tenant globally
        app()->instance('currentTenant', $tenant);

        // Optionally: bind tenant ID globally for all Eloquent queries
        TenantScope::setTenant($tenant->id);

        return $next($request);
    }
}
