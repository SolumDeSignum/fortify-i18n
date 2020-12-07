<?php

declare(strict_types=1);

namespace Laravel\Fortify\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\PasswordConfirmedResponse as PasswordConfirmedResponseContract;
use Laravel\Fortify\Traits\RouteLocalePrefix;

class PasswordConfirmedResponse implements PasswordConfirmedResponseContract
{
    use RouteLocalePrefix;

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return $request->wantsJson()
            ? new JsonResponse('', 201)
            : redirect()->intended(
                $this->localePrefix($request) . config('fortify.home')
            );
    }
}
