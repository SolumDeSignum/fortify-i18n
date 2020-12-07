<?php

declare(strict_types=1);

namespace Laravel\Fortify\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse;
use Laravel\Fortify\Traits\RouteLocalePrefix;

class EmailVerificationPromptController extends Controller
{
    use RouteLocalePrefix;

    /**
     * Display the email verification prompt.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Laravel\Fortify\Contracts\VerifyEmailViewResponse
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(
                $this->localePrefix($request)
                . config('fortify.home')
            )
            : app(VerifyEmailViewResponse::class);
    }
}
