<?php

declare(strict_types=1);

namespace Laravel\Fortify\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Http\Requests\VerifyEmailRequest;
use Laravel\Fortify\Traits\RouteLocalePrefix;

use function config;
use function redirect;

class VerifyEmailController extends Controller
{
    use RouteLocalePrefix;

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param VerifyEmailRequest $request
     *
     * @return RedirectResponse|JsonResponse
     */
    public function __invoke(VerifyEmailRequest $request): RedirectResponse|JsonResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new JsonResponse('', 204)
                : redirect()->intended(
                    $this->localePrefix($request)
                    . config('fortify.home') . '?verified=1'
                );
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return $request->wantsJson()
            ? new JsonResponse('', 202)
            : redirect()->intended(
                $this->localePrefix($request)
                . config('fortify.home') . '?verified=1'
            );
    }
}
