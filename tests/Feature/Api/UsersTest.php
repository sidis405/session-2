<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Acme\Domain\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_all_users()
    {
        $users = create(User::class, [], 10);

        $response = $this->get(route('api.users.index'));

        $response->assertOk();

        $users->each(function ($user) use ($response) {
            $response->assertJsonFragment(['name' => $user->name]);
        });
    }

    /** @test */
    public function it_shows_a_single_user()
    {
        $user = create(User::class);

        $response = $this->get(route('api.users.show', $user));

        $response->assertOk();

        $response->assertJsonFragment(['name' => $user->name]);
    }
}
