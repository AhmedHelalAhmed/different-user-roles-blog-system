<?php

namespace App\Http\Middleware;

use Closure;
use App\Type;

class PostUser
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
        if ($request->user()->type_id != Type::where('permission', "post")->get()->toArray()[0]["id"])
        {
            return redirect('home');
        }

        return $next($request);
    }
}
