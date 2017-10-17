<?php

namespace App\Http\Middleware;

use Closure;

class VerifyOwner
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
        $user = $request->route()->parameter('user');

        if(!auth()->check()){
            return redirect('login');
        }

        if(!auth()->user()->canOrOwns($user->id, 'global-edit-user-rh')){
            return redirect()->back()->withErrors('Você não possui permissão para ver a página');
        }


        return $next($request);
    }
}
