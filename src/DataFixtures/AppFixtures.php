<?php

namespace App\DataFixtures;

use App\Domain\Company\Company;
use App\Domain\Company\CompanyConfiguration;
use App\Domain\Company\Vo\CompanyFixedValue;
use App\Domain\Company\Vo\CompanyMaxWeight;
use App\Domain\Company\Vo\CompanyMinWeight;
use App\Domain\Company\Vo\CompanyName;
use App\Domain\Company\Vo\CompanyOnDemandValue;
use App\Domain\Product\Product;
use App\Domain\Product\Vo\ProductName;
use App\Domain\Product\Vo\ProductWeight;
use App\Domain\ProductsCompaniesWinner\ProductsCompaniesWinner;
use App\Domain\Winner\Vo\WinnerDistance;
use App\Domain\Winner\Winner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /** @var array|Company  */
    protected array $companies;

    public function load(ObjectManager $manager)
    {
        $this->companies = $this->addCompanies($manager);
        $this->addProductsAndWinners($manager);
        $manager->flush();
    }

    private function addProductsAndWinners(ObjectManager $manager)
    {
        $association = [];

        $earphone = new Product();
        $earphone->setName(new ProductName('Fone de ouvido'));
        $earphone->setWeight(new ProductWeight(1));
        $manager->persist($earphone);

        $winnerEarphone1km = new Winner(new WinnerDistance(1));
        $manager->persist($winnerEarphone1km);
        $winnerEarphone430km = new Winner(new WinnerDistance(430));
        $manager->persist($winnerEarphone430km);
        $winnerEarphone33km = new Winner(new WinnerDistance(33));
        $manager->persist($winnerEarphone33km);
        $winnerEarphone50km = new Winner(new WinnerDistance(50));
        $manager->persist($winnerEarphone50km);
        $association['earphone'] = [$winnerEarphone1km, $winnerEarphone430km, $winnerEarphone33km, $winnerEarphone50km];
        $this->associationProductsCompaniesWithWinners($manager, $earphone, $association['earphone']);

        $xBoxControl = new Product();
        $xBoxControl->setName(new ProductName('Controle de Xbox'));
        $xBoxControl->setWeight(new ProductWeight(3));
        $manager->persist($xBoxControl);

        $winnerXBoxControl1km = new Winner(new WinnerDistance(1));
        $manager->persist($winnerXBoxControl1km);
        $winnerXBoxControl100km = new Winner(new WinnerDistance(100));
        $manager->persist($winnerXBoxControl100km);
        $association['xBoxControl'] = [$winnerXBoxControl1km, $winnerXBoxControl100km];
        $this->associationProductsCompaniesWithWinners($manager, $xBoxControl, $association['xBoxControl']);

        $gamerPc = new Product();
        $gamerPc->setName(new ProductName('Pc Gamer'));
        $gamerPc->setWeight(new ProductWeight(35));
        $manager->persist($gamerPc);

        $winnerGamerPc1km = new Winner(new WinnerDistance(1));
        $manager->persist($winnerGamerPc1km);
        $winnerGamerPc1000km = new Winner(new WinnerDistance(1000));
        $manager->persist($winnerGamerPc1000km);
        $association['gamerPc'] = [$winnerGamerPc1km, $winnerGamerPc1000km];
        $this->associationProductsCompaniesWithWinners($manager, $gamerPc, $association['gamerPc']);

        $gamerKit = new Product();
        $gamerKit->setName(new ProductName('Kit Gamer'));
        $gamerKit->setWeight(new ProductWeight(5));
        $manager->persist($gamerKit);

        $winnerKitGamer = new Winner(new WinnerDistance(1000));
        $manager->persist($winnerKitGamer);
        $association['gamerKit'] = [$winnerKitGamer];
        $this->associationProductsCompaniesWithWinners($manager, $gamerKit, $association['gamerKit']);

        $keyboardEarphone = new Product();
        $keyboardEarphone->setName(new ProductName('Teclado + Fone'));
        $keyboardEarphone->setWeight(new ProductWeight(6));
        $manager->persist($keyboardEarphone);

        $winnerKeyboardEarphone = new Winner(new WinnerDistance(5));
        $manager->persist($winnerKeyboardEarphone);
        $association['keyboardEarphone'] = [$winnerKeyboardEarphone];
        $this->associationProductsCompaniesWithWinners($manager, $keyboardEarphone, $association['keyboardEarphone']);
    }

    private function addCompanies(ObjectManager $manager)
    {
        $boaDex = new Company();
        $boaDex->setName(new CompanyName('BoaDex'));
        $boaDexConfig = new CompanyConfiguration();
        $boaDexConfig->setFixedValue(new CompanyFixedValue(10.00));
        $boaDexConfig->setOnDemandValue(new CompanyOnDemandValue(0.05));
        $boaDexConfig->setMinWeight(new CompanyMinWeight(0));
        $boaDexConfig->setMaxWeight(new CompanyMaxWeight(10000));
        $boaDexConfig->setCompany($boaDex);
        $manager->persist($boaDexConfig);
        $manager->persist($boaDex);

        $boaLog = new Company();
        $boaLog->setName(new CompanyName('BoaLog'));
        $boaLogConfig = new CompanyConfiguration();
        $boaLogConfig->setFixedValue(new CompanyFixedValue(4.30));
        $boaLogConfig->setOnDemandValue(new CompanyOnDemandValue(0.12));
        $boaLogConfig->setMinWeight(new CompanyMinWeight(0));
        $boaLogConfig->setMaxWeight(new CompanyMaxWeight(10000));
        $boaLogConfig->setCompany($boaLog);
        $manager->persist($boaLogConfig);
        $manager->persist($boaLog);

        $transBoa = new Company();
        $transBoa->setName(new CompanyName('Transboa'));
        $transBoaConfig1 = new CompanyConfiguration();
        $transBoaConfig1->setFixedValue(new CompanyFixedValue(2.10));
        $transBoaConfig1->setOnDemandValue(new CompanyOnDemandValue(1.10));
        $transBoaConfig1->setMinWeight(new CompanyMinWeight(0));
        $transBoaConfig1->setMaxWeight(new CompanyMaxWeight(5));
        $transBoaConfig1->setCompany($transBoa);
        $manager->persist($transBoaConfig1);

        $transBoaConfig2 = new CompanyConfiguration();
        $transBoaConfig2->setFixedValue(new CompanyFixedValue(10.00));
        $transBoaConfig2->setOnDemandValue(new CompanyOnDemandValue(0.01));
        $transBoaConfig2->setMinWeight(new CompanyMinWeight(6));
        $transBoaConfig2->setMaxWeight(new CompanyMaxWeight(10000));
        $transBoaConfig2->setCompany($transBoa);
        $transBoa->addConfiguration($transBoaConfig1);
        $transBoa->addConfiguration($transBoaConfig2);
        $manager->persist($transBoaConfig2);
        $manager->persist($transBoa);

        return [$boaDex, $boaLog, $transBoa];
    }

    private function associationProductsCompaniesWithWinners(ObjectManager $manager, Product $product, array $winners)
    {
        /** @var Company $company */
        foreach ($this->companies as $company) {
            /** @var Winner $winner */
            foreach ($winners as $winner) {
                $pivot = new ProductsCompaniesWinner();
                $pivot->setCompany($company);
                $pivot->setProduct($product);
                $pivot->setWinner($winner);
                $manager->persist($pivot);
            }
        }
    }
}
