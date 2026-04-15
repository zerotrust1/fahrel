<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class VpnAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Common OpenVPN subnet is 10.8.0.0/24
        // You can customize this IP check based on your OpenVPN configuration
        $clientIp = $request->ip();
        $allowedPrefix = env('VPN_ALLOWED_PREFIX', '10.8.0.');

        if (!str_starts_with($clientIp, $allowedPrefix) && !app()->environment('local')) {
            Log::warning("Unauthorized Admin Access Attempt from IP: $clientIp");
            return response()->view('welcome', [
                'guests' => \App\Models\Guestbook::orderBy('id', 'desc')->get(),
                'error' => 'Access Denied: You must be connected to the HostData VPN to access this terminal.'
            ], 403);
        }

        return $next($request);
    }
}
