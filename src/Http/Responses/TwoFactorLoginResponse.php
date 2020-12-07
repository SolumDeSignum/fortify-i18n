<?php

declare(strict_types=1);

namespace Laravel\Fortify\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;
use Laravel\Fortify\Traits\RouteLocalePrefixTrait;

class TwoFactorLoginResponse implements TwoFactorLoginResponseContract
{
    use RouteLocalePrefixTrait;

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return $request->wantsJson()
                    ? new JsonResponse('', 204)
                    : redirect()->intended(config('fortify.home'));
    }
}
