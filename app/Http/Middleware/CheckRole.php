<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->Route('login');
        }
        $user = Auth::User();
        foreach ($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if ($user->role == $role) {
                return $next($request);
            }
        }
        return redirect('login');
    }
}
