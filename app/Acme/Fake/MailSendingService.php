<?php

namespace Acme\Fake;

use Acme\Domain\Models\User;
use Acme\Fake\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class MailSendingService
{
    public function sendWelcomeMailTo(User $user): void
    {
        Mail::to($user)->send(new WelcomeMail('bar'));
    }
}
