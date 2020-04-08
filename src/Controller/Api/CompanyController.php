<?php


namespace App\Controller\Api;


use App\Infrastructure\Company\CompanyRepository;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class CompanyController extends BaseController
{
    /** @var CompanyRepository $companyRepository */
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @Route("/company", methods={"GET"})
     */
    public function companies()
    {
        return $this->success($this->companyRepository->findAll());
    }
}