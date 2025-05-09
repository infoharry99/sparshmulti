<?php
// App\Http\Middleware\IdentifyTenant.php
namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;

class IdentifyTenant
{
    public function handle($request, Closure $next)
    {
        // Example: based on subdomain
        $domain = $request->getHost(); // e.g. tenant1.example.com
        $tenant = Tenant::where('domain', $domain)->first();

        if ($tenant) {
            app()->instance('currentTenant', $tenant);
        }

        return $next($request);
    }
}
