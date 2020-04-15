<?php

namespace Acme\Fake;

use Acme\Domain\Models\User;
use Acme\Fake\Jobs\SendWelcomeEmailJob;

class JobFiringService
{
    public function fireJobWithParams(User $user): void
    {
        SendWelcomeEmailJob::dispatch($user);
    }
}
