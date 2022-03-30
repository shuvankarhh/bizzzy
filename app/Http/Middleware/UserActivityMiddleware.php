<?php

namespace App\Http\Middleware;

use App\Models\UserOnlinePresence;
use Closure;
use Illuminate\Http\Request;

class UserActivityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        UserOnlinePresence::where('user_id', auth()->id())->update([
            'last_seen' => now()
        ]);

        return $next($request);
    }
}
