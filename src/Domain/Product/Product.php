<?php


namespace App\Domain\Product;

use App\Domain\Product\Vo\ProductName;
use App\Domain\Product\Vo\ProductWeight;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="products")
 */
class Product implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Embedded(class="App\Domain\Product\Vo\ProductName", columnPrefix=false)
     */
    private ProductName $name;

    /**
     * @ORM\Embedded(class="App\Domain\Product\Vo\ProductWeight", columnPrefix=false)
     */
    private ProductWeight $weight;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ProductName
     */
    public function getName(): ProductName
    {
        return $this->name;
    }

    /**
     * @param ProductName $name
     */
    public function setName(ProductName $name): void
    {
        $this->name = $name;
    }

    /**
     * @return ProductWeight
     */
    public function getWeight(): ProductWeight
    {
        return $this->weight;
    }

    /**
     * @param ProductWeight $weight
     */
    public function setWeight(ProductWeight $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()->value(),
            'weight' => $this->getWeight()->value()
        ];
    }
}