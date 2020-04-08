<?php


namespace App\Controller\Web;

use App\Domain\ProductsCompaniesWinner\ProductsCompaniesWinner;
use App\Infrastructure\Company\CompanyRepository;
use App\Infrastructure\Product\ProductRepository;
use App\Infrastructure\ProductsCompaniesWinner\ProductsCompaniesWinnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /** @var ProductsCompaniesWinnerRepository $repository */
    private ProductsCompaniesWinnerRepository $repository;
    /**
     * @var CompanyRepository
     */
    private CompanyRepository $companyRepository;
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;

    /**
     * IndexController constructor.
     * @param ProductsCompaniesWinnerRepository $repository
     */
    public function __construct(ProductsCompaniesWinnerRepository $repository, CompanyRepository $companyRepository, ProductRepository $productRepository)
    {
        $this->repository = $repository;
        $this->companyRepository = $companyRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/", name="home", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function home(Request $request)
    {
        $data = [];
        $query = $request->query->getIterator();
        $results = $this->repository->filterByQuery($query);
        $companies = $this->companyRepository->findAll();
        $products = $this->productRepository->findAll();

        /** @var ProductsCompaniesWinner $result */
        foreach ($results as $result) {
            $item = [];
            $item['company'] = $result->getCompany()->getName()->value();
            $item['product'] = $result->getProduct()->getName()->value();
            $item['productWeight'] = $result->getProduct()->getWeight()->value();
            $item['distance'] = $result->getWinner()->getDistance()->value();
            $item['cost'] = $result->getDistanceCost();
            $data[] = $item;
        }

        return $this->render('/index.html.twig', compact('data', 'companies', 'products', 'query'));
    }
}