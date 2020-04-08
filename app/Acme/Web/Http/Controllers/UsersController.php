<?php

namespace Acme\Web\Http\Controllers;

use Acme\Domain\Models\User;
use App\Http\Controllers\Controller;
use Acme\Api\Http\Resources\UserResource;
use Acme\Domain\Repositories\UsersRepository;

class UsersController extends Controller
{
    protected $usersRepo;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }

    public function index()
    {
        return $this->usersRepo->getAll();
    }

    public function show(User $user)
    {
        return new UserResource($user->load('offers.contracts'));
    }
}
