<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAction
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
        if(auth()->check())
        {
            $user = Auth::user();
            if ($user->role_id == 3) {

                return redirect()->to('/permissions');

            }else
            {
                return $next($request);
            }

        }else
        {
            return redirect('login');
        }

    }
}
