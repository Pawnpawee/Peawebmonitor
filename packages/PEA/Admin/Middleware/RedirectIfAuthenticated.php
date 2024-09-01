<?php
namespace PEA\Admin\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Sentinel::check()) {
            return redirect()
                ->guest(route('http::dashboard'));
        }

        return $next($request);
    }
}
