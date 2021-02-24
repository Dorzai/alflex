<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Str;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

/**
 * This middlware changes default behaviour of the VerifyCsrfToken middlware,
 * so it works for using with a REST API, without the use of sessions.
 *
 * Instead of comparing the given CSRF token (from HTTP header or POST field) with
 * the token from the session, this middleware will now comparing the given CSRF token
 * in HTTP header with the CSRF token in the cookie.
 *
 * Client must read the value from the CSRF-TOKEN cookie en place the value in
 * the X-CSRF-TOKEN header for each POST/PUT request.
 */
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '*'
    ];

    /**
     * Determine if the session and input CSRF tokens match.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function tokensMatch($request)
    {
        $tokenInRequest = $this->getTokenFromRequest($request);
        $tokenInCookie = $this->getTokenFromCookie($request);

        if (!$tokenInCookie) {
            // No cookie found with CSRF token, force a match so no
            // CSRF error is given
            return true;
        }

        return is_string($tokenInRequest) && hash_equals($tokenInCookie, $tokenInRequest);
    }

    /**
     * Add the CSRF token to the response cookies.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function addCookieToResponse($request, $response)
    {
        $response->headers->setCookie(
            new Cookie(
                'CSRF-TOKEN',
                $this->generateCsrfToken(),
                $this->availableAt(60 * config('auth.refresh_tokens_expire_in_minutes')),
                "",         // path
                "",         // domain
                false,      // secure   TODO set to true
                false      // httponly
            )
        );

        return $response;
    }

    /**
     * Generate a new CSRF token
     *
     * @return string
     */
    protected function generateCsrfToken()
    {
        return Str::random(40);
    }

    /**
     * Get the CSRF token from the cookie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function getTokenFromCookie($request)
    {
        return $request->cookie('CSRF-TOKEN');
    }
}
