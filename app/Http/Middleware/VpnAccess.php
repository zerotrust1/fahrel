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
        
        // Use config() which is more reliable than env() in production/cached states
        $allowedPrefix = config('app.vpn_allowed_prefix');

        // SECURITY: If config is missing, block EVERYTHING to admin for safety
        if (empty($allowedPrefix)) {
            Log::emergency("VPN_SECURITY_BREACH: VPN_ALLOWED_PREFIX is not set in config. Blocking all admin access.");
            return $this->denyAccess($clientIp, "CONFIG_VOID");
        }

        // Strict prefix verification
        if (!str_starts_with($clientIp, $allowedPrefix)) {
            Log::warning("VPN_ACCESS_DENIED: IP $clientIp attempted access without VPN prefix $allowedPrefix");
            return $this->denyAccess($clientIp, "INVALID_TUNNEL");
        }

        return $next($request);
    }

    /**
     * Deny access with a professional technical response
     */
    private function denyAccess($ip, $reason)
    {
        try {
            $guests = \App\Models\Guestbook::orderBy('id', 'desc')->get();
        } catch (\Exception $e) {
            $guests = collect([]);
        }

        return response()->view('welcome', [
            'guests' => $guests,
            'error' => "SYSTEM_ACCESS_DENIED [$reason]: Your endpoint ($ip) is not connected to the authorized HostData VPN tunnel."
        ], 403);
    }
}
