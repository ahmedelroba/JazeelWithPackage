<?php

namespace Uxbert\Gamification\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;

class SetAPILocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check())
            date_default_timezone_set(auth()->user()->timezone);
        else
            date_default_timezone_set('Asia/Riyadh');

        if ($request->lang == "ar")
            Carbon::setLocale("ar_SA");
        else
            Carbon::setLocale("en_US");

        return $next($request);
    }
}
