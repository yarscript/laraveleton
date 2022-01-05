<?php

namespace Yarscript\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Bouncer
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ?string $guard = 'admin')
    {
        try {
            $test = \Illuminate\Support\Facades\Auth::guard('admin')->user();
        } catch (\Exception $exception) {
            $test2 = 1;
        }
        if (! Auth::guard($guard)->check()) {
            return redirect()->route('admin.session.create');
        }

//        $this->checkIfAuthorized($request);

        return $next($request);
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @return mixed
     */
    public function checkIfAuthorized(Request $request)
    {
        if (! $role = auth()->guard('admin')->user()->role_id) {
            abort(401, 'This action is unauthorized.');
        }
    }
}
