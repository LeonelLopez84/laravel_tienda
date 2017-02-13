<?php

namespace Ecommerce\Http\Middleware;

use Closure;
use Ecommerce\User;
use Illuminate\Support\Facades\Auth;

class ValidateFirstUserSignUp
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
        $usersCount = User::count();
        if($usersCount > 0 && !Auth::check()){
            return redirect("/");
        }

        return $next($request);
    }
}
