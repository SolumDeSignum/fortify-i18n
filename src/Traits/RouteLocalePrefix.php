<?php

declare(strict_types=1);

namespace Laravel\Fortify\Traits;

use Illuminate\Http\Request;

trait RouteLocalePrefix
{
    /**
     * @param mixed $request
     *
     * @return string|null
     */
    private function localePrefix(mixed $request): ?string
    {
        /**
         * @var $request Request
         */
        $locale = $request->cookie('locale');

        return $locale ? '/' . $locale : null;
    }
}
