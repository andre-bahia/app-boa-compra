<?php


namespace App\Infrastructure\ProductsCompaniesWinner;


use App\Domain\ProductsCompaniesWinner\ProductsCompaniesWinner;
use App\Infrastructure\Shared\BaseRepository;

class ProductsCompaniesWinnerRepository extends BaseRepository
{
    protected string $entity = ProductsCompaniesWinner::class;

    public function filterByQuery(\ArrayIterator $query)
    {
        $queryBuilder = $this->repository->createQueryBuilder('pcw');

        if (isset($query['company']) && !empty($query['company'])) {
           $queryBuilder->andWhere('pcw.company = :company');
           $queryBuilder->setParameter(':company', $query['company']);
        }

        if (isset($query['product']) && !empty($query['product'])) {
            $queryBuilder->andWhere('pcw.product = :product');
            $queryBuilder->setParameter(':product', $query['product']);
        }

        $queryBuilder->orderBy('pcw.distanceCost', 'asc');
        return $queryBuilder->getQuery()->getResult();
    }
}