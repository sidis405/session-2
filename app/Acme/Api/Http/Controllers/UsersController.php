<?php

namespace Acme\Api\Http\Controllers;

use Acme\Domain\Models\User;
use App\Http\Controllers\Controller;
use Acme\Api\Http\Resources\UserResource;
use Acme\Domain\Repositories\Contracts\UsersRepositoryContract;

class UsersController extends Controller
{
    protected $usersRepo;

    public function __construct(UsersRepositoryContract $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }

    public function index(UsersRepositoryContract $usersRepo)
    {
        return UserResource::collection($this->usersRepo->getAll('offers.contracts'));
    }

    public function show(User $user)
    {
        return new UserResource($this->usersRepo->getOne($user, 'offers.contracts'));
    }
}
