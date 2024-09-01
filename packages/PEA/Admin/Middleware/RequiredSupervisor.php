<?php
namespace PEA\Admin\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequiredSupervisor
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Sentinel::getUser();

        abort_if(!$user->isAdmin(), 401);

        return $next($request);
    }
}