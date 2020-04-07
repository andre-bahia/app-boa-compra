<?php


namespace App\Application\Service;

use App\Domain\Company\CompanyConfiguration;
use App\Domain\Product\Product;
use App\Domain\ProductsCompaniesWinner\ProductsCompaniesWinner;
use App\Domain\Shared\Exception\CalculateCostException;
use App\Domain\Winner\Winner;
use App\Infrastructure\ProductsCompaniesWinner\ProductsCompaniesWinnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Psr\Log\LoggerInterface;

class CalculateCostService
{
    /** @var ProductsCompaniesWinnerRepository */
    protected ProductsCompaniesWinnerRepository $repository;

    /** @var LoggerInterface $logger */
    protected LoggerInterface $logger;

    public function __construct(ProductsCompaniesWinnerRepository $repository, LoggerInterface $logger)
    {
        $this->repository = $repository;
        $this->logger = $logger;
    }

    /**
     * @throws CalculateCostException
     */
    public function execute()
    {
        $results = $this->repository->findAll();

        /** @var ProductsCompaniesWinner $item */
        foreach ($results as $item) {

            /** @var ArrayCollection $configurations */
            $configurations = $item->getCompany()->getConfigurations();
            $product = $item->getProduct();

            if ($configurations->count() > 1) {
               $configuration = $configurations->filter(function (CompanyConfiguration $item) use ($product) {
                   return $product->getWeight()->value() >= $item->getMinWeight()->value() && $product->getWeight()->value() <= $item->getMaxWeight()->value();
               })->first();
            } else {
               $configuration = $configurations->first();
            }

            $item->setDistanceCost($this->calculate($product, $item->getWinner(), $configuration));

            try {
                $this->repository->save($item);
            } catch (\Exception $e) {
                $this->logger->error($e->getTrace());
                throw new CalculateCostException();
            }
        }
    }

    public function calculate(Product $product, Winner $winner, CompanyConfiguration $configuration): float
    {
        return $configuration->getFixedValue()->value() + ($product->getWeight()->value() * $winner->getDistance()->value() * $configuration->getOnDemandValue()->value());
    }
}