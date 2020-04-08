<?php


namespace App\Tests\Application\Service;


use App\Application\Service\CalculateCostService;
use App\Domain\Company\CompanyConfiguration;
use App\Domain\Product\Product;
use App\Domain\Winner\Winner;
use App\Infrastructure\ProductsCompaniesWinner\ProductsCompaniesWinnerRepository;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CalculateDistanceCostTest extends TestCase
{
    public function testInitCalculateCostService()
    {
        /** @var ProductsCompaniesWinnerRepository $repository */
        $repository = $this->createMock(ProductsCompaniesWinnerRepository::class);
        /** @var LoggerInterface $logger */
        $logger = $this->createMock(LoggerInterface::class);
        $calculateCostService = new CalculateCostService($repository, $logger);
        $this->assertInstanceOf(CalculateCostService::class, $calculateCostService);
    }

    public function testMethodCalculate()
    {
        /** @var Product $product */
        $product = $this->createMock(Product::class);
        /** @var Winner $winner */
        $winner = $this->createMock(Winner::class);
        /** @var CompanyConfiguration $configuration */
        $configuration = $this->createMock(CompanyConfiguration::class);

        $service = $this->getMockBuilder(CalculateCostService::class)
                        ->disableOriginalConstructor()
                        ->disableOriginalClone()
                        ->disallowMockingUnknownTypes()
                        ->getMock();

        $service->method('execute')
                ->willReturn(25.3);

        $this->assertSame(25.3, $service->execute($product, $winner, $configuration));
    }
}