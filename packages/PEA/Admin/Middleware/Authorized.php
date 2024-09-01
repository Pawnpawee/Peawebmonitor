<?php
namespace PEA\Admin\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PEA\Http\Support\Facades\Adapter;
use Symfony\Component\HttpFoundation\Response;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class Authorized
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::check();

        if ( ! $user) {
            return redirect()
                ->guest(route('admin::auth.login'));
        }

//        $user = Sentinel::getUser();
//
//        if(!session()->has('adapter')) {
//           Adapter::refresh();
//        }
//
//        if(empty(Adapter::getAccessType())) {
//            Adapter::forceAccess();
//        }
//
//        if ($user->isAdmin()) {
//            return $next($request);
//        }
//
//        return $next($request);
        return $next($request);
    }
}