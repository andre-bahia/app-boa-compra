<?php


namespace App\Controller\Api;


use App\Infrastructure\ProductsCompaniesWinner\ProductsCompaniesWinnerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ProductsCompaniesWinnerController extends BaseController
{
    /** @var ProductsCompaniesWinnerRepository  */
    protected ProductsCompaniesWinnerRepository $repository;

    public function __construct(ProductsCompaniesWinnerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/distance-cost", methods={"GET"})'
     * @param Request $request
     * @return JsonResponse
     */
    public function listAll(Request $request)
    {
        $query = $request->query->getIterator();
        return $this->success($this->repository->filterByQuery($query));
    }
}