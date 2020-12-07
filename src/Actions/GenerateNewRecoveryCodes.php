<?php

declare(strict_types=1);

namespace Laravel\Fortify\Actions;

use Illuminate\Support\Collection;
use Laravel\Fortify\RecoveryCode;

class GenerateNewRecoveryCodes
{
    /**
     * Generate new recovery codes for the user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function __invoke($user): void
    {
        $user->forceFill([
            'two_factor_recovery_codes' => encrypt(\json_encode(Collection::times(8, function () {
                return RecoveryCode::generate();
            })->all())),
        ])->save();
    }
}
