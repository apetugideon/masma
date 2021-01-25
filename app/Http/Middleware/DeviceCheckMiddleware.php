<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DeviceCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\App\Models\Device::where('client_token', $request->client_token)->exists()){
            return $next($request);
        }
        return false;
    }
}
