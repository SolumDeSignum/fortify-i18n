<?php

declare(strict_types=1);

namespace Laravel\Fortify\Traits;

trait RouteLocalePrefix
{
    /**
     * @param mixed $request
     *
     * @return string
     */
    private function localePrefix($request): ?string
    {
        $locale = $request->cookie('locale');
        return $locale ? '/' . $locale : null;
    }
}
