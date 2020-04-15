<?php

namespace Tests\Feature\Api;

use Mockery;
use Tests\TestCase;
use Acme\Domain\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Acme\Domain\Repositories\Contracts\UsersRepositoryContract;

class UsersTest extends TestCase
{
    // Mocking
    // ApiResponseMocking

    use RefreshDatabase;

    /** @test */
    public function it_lists_all_users()
    {
        // act
        // $user = create(User::class, [
        //     'name' => 'Pippo',
        //     'email' => 'pippo@example.com',
        // ]);
        // $userCollection = new Collection([$user]);

        // $mockUserRepo = Mockery::mock(UsersRepositoryContract::class)->makePartial();
        // $mockUserRepo->shouldReceive('getAll')->andReturn($userCollection);
        // $this->app->instance(UsersRepositoryContract::class, $mockUserRepo);

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

    /** @test */
    public function trying_mocking_ideas()
    {
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->shouldReceive('getName')->andReturn('Pippo');
        $this->app->instance(User::class, $mockUser);

        $user = create(User::class);

        $otherUser = $user->getOtherUser();

        $otherUser->getName();

        $this->assertSame('Pippo', $otherUser->getName());
    }
}
