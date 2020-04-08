<?php


namespace App\Controller\Api;


use App\Infrastructure\Company\CompanyRepository;
use App\Infrastructure\Product\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ProductController extends BaseController
{
    /** @var ProductRepository $productRepository */
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/product", methods={"GET"})
     */
    public function products()
    {
        return $this->success($this->productRepository->findAll());
    }
}