<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as AuthenticateMiddleware;

class Authenticate extends AuthenticateMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
    
    /**
     * Handle an incoming request.
     * Overrides parent implementation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // When access token is in cookie, convert cookie to a HTTP authorization Bearer 
        // token for further authentication
        if ($request->cookie('access_token')) {
            $request->headers->set('Authorization', 'Bearer ' . $request->cookie('access_token'));
        }
        
        $this->authenticate($request, $guards);

        return $next($request);
    }
}
