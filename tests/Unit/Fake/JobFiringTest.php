<?php

namespace Tests\Unit\Fake;

use Tests\TestCase;
use Acme\Domain\Models\User;
use Acme\Fake\JobFiringService;
use Illuminate\Support\Facades\Bus;
use Acme\Fake\Jobs\SendWelcomeEmailJob;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFiringTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function job_is_fired()
    {
        Bus::fake();

        $service = new JobFiringService;
        $user = create(User::class);

        $service->fireJobWithParams($user);

        Bus::assertDispatched(SendWelcomeEmailJob::class, function ($job) use ($user) {
            return $job->user->id === $user->id;
        });
    }
}
