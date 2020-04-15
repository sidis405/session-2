<?php

namespace Tests\Unit\Fake;

use Tests\TestCase;
use Acme\Domain\Models\User;
use Acme\Fake\JobFiringService;
use Acme\Fake\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailSendingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function mail_is_sent_through_job()
    {
        Mail::fake();

        $service = new JobFiringService;
        $user = create(User::class);

        $service->fireJobWithParams($user);

        Mail::assertSent(WelcomeMail::class, function ($mail) use ($user) {
            $mail->build();

            return $mail->hasTo($user->email) &&
            $mail->ticketNumber == 'bar' &&
            $mail->subject == 'Your bar ticket is ready';
        });
    }
}
