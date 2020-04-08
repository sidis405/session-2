<?php

namespace Acme\Web\Http\Controllers;

use Acme\Domain\Models\User;
use App\Http\Controllers\Controller;
use Acme\Domain\Repositories\Contracts\UsersRepositoryContract;

class UsersController extends Controller
{
    protected $usersRepo;

    public function __construct(UsersRepositoryContract $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }

    public function index()
    {
        return $this->usersRepo->getAll();
    }

    public function show(User $user)
    {
        return $this->usersRepo->getOne($user, 'offers.contracts');
    }
}
