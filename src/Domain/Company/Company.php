<?php

namespace App\Domain\Company;

use App\Domain\Company\Vo\CompanyName;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="companies")
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @var CompanyName
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyName", columnPrefix=false)
     */
    private CompanyName $name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="CompanyConfiguration", mappedBy="company", cascade={"persist"})
     */
    private Collection $configurations;

    public function __construct()
    {
        $this->configurations = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return CompanyName
     */
    public function getName(): CompanyName
    {
        return $this->name;
    }

    /**
     * @param CompanyName $name
     */
    public function setName(CompanyName $name): void
    {
        $this->name = $name;
    }

    public function addConfiguration(CompanyConfiguration $configuration)
    {
        $this->configurations->add($configuration);
    }

    /**
     * @return Collection
     */
    public function getConfigurations(): Collection
    {
        return $this->configurations;
    }
}