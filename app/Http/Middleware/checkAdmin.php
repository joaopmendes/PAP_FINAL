<?php

namespace App\Http\Middleware;

use Closure;

class checkAdmin
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
        try {
            $is_admin = \Auth::user()->admin;

        } catch (\Throwable $th) {
            return redirect('/');
        }
        if($is_admin == 'true'){
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
