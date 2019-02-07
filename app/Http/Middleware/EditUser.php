<?php

namespace App\Http\Middleware;

use Closure;
use App\Type;

class EditUser
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

        if ($request->user()->type_id != Type::where('permission', "edit")->get()->toArray()[0]["id"])
        {
            return redirect('home');
        }


        return $next($request);
    }
}
