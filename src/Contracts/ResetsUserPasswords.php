<?php

declare(strict_types=1);

namespace Laravel\Fortify\Contracts;

interface ResetsUserPasswords
{
    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function reset($user, array $input): void;
}
