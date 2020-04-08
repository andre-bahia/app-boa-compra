<?php


namespace App\Domain\ProductsCompaniesWinner;

use App\Domain\Company\Company;
use App\Domain\Product\Product;
use App\Domain\Winner\Winner;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="products_companies_winner")
 */
class ProductsCompaniesWinner
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Domain\Product\Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    private Product $product;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Domain\Company\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
     */
    private Company $company;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Domain\Winner\Winner")
     * @ORM\JoinColumn(name="winner_id", referencedColumnName="id", nullable=false)
     */
    private Winner $winner;

    /**
     * @ORM\Column(name="distance_cost", type="decimal", precision=20, scale=2, nullable=true)
     */
    private float $distanceCost;

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    public function getWinner(): Winner
    {
        return $this->winner;
    }

    public function setWinner(Winner $winner): void
    {
        $this->winner = $winner;
    }

    public function getDistanceCost(): float
    {
        return $this->distanceCost;
    }

    public function setDistanceCost($distanceCost): void
    {
        $this->distanceCost = $distanceCost;
    }
}