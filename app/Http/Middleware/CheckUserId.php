<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use Cookie;
Use Session;

class CheckUserId
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
        $value = $request->cookie('user_id');

        if($value){
            return  $next($request);
        }
        return redirect('/signin');
        
    }
}
