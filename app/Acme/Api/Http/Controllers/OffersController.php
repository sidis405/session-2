<?php

namespace Acme\Api\Http\Controllers;

use Acme\Domain\Models\Offer;
use App\Http\Controllers\Controller;
use Acme\Api\Http\Resources\OfferResource;
use Acme\Domain\Repositories\OffersRepository;

class OffersController extends Controller
{
    protected $offersRepo;

    public function __construct(OffersRepository $offersRepo)
    {
        $this->offersRepo = $offersRepo;
    }

    public function index()
    {
        return OfferResource::collection($this->offersRepo->getAll('user', 'contracts'));
    }

    public function show(Offer $offer)
    {
        return new OfferResource($this->offersRepo->getOne($offer, 'user', 'contracts'));
    }
}
