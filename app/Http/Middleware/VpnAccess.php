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
        $clientIp = $request->ip();
        $allowedPrefix = env('VPN_ALLOWED_PREFIX');

        // Logic check: if prefix is not defined, deny everyone for safety
        if (empty($allowedPrefix)) {
            Log::emergency("CRITICAL: VPN_ALLOWED_PREFIX is not defined in .env. Admin access blocked.");
            return $this->denyAccess($clientIp);
        }

        // Strict prefix verification
        if (!str_starts_with($clientIp, $allowedPrefix)) {
            Log::warning("SECURITY ALERT: Admin access denied for IP $clientIp. Required prefix: $allowedPrefix");
            return $this->denyAccess($clientIp);
        }

        return $next($request);
    }

    /**
     * Deny access with a professional technical response
     */
    private function denyAccess($ip)
    {
        try {
            $guests = \App\Models\Guestbook::orderBy('id', 'desc')->get();
        } catch (\Exception $e) {
            $guests = collect([]);
        }

        return response()->view('welcome', [
            'guests' => $guests,
            'error' => "SYSTEM_ACCESS_DENIED: Your endpoint ($ip) is not connected to the authorized HostData VPN tunnel."
        ], 403);
    }
}
