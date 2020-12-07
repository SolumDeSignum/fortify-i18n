<?php

declare(strict_types=1);

namespace Laravel\Fortify\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Traits\RouteLocalePrefix;

class LoginResponse implements LoginResponseContract
{
    use RouteLocalePrefix;

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(
                $this->localePrefix($request)
                . config('fortify.home')
            );
    }
}
