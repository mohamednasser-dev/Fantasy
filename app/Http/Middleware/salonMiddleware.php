<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class salonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type == 'salon' && Auth::user()->salon_payment_status == 'yes' ) {
            return $next($request);
        } else {
            return redirect()->route('home')->with('danger',trans('admin.paymentError'));

        }
    }
}
