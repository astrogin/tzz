<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Authenticate
{
    private $adminStatus;

    public function __construct(Factory $auth)
    {
        $this->adminStatus = (int)config('sleeping_owl.adminRoleName');
        parent::__construct($auth);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $auth = Auth::guard($guards);
        if (!$auth->user()) {
            return redirect()->route('login');
        }
        if ($auth->user()->role != $this->adminStatus) {
            $auth->logout();
            $request->session()->invalidate();
            return redirect()->route('login')->with('error', 'Access denied');
        }
        $this->authenticate($guards);
        return $next($request);
    }
}
