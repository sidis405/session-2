<?php

namespace Acme\Web\Http\Controllers;

use Acme\Domain\Models\Offer;
use App\Http\Controllers\Controller;

class OffersController extends Controller
{
    public function __construct(OffersRepository $offersRepo)
    {
        $this->offersRepo = $offersRepo;
    }

    public function index()
    {
        return $this->offersRepo->getAll('user', 'contracts');
    }

    public function show(Offer $offer)
    {
        return $this->offersRepo->getOne($offer, 'user', 'contracts');
    }
}
