<?php


namespace App\Infrastructure\ProductsCompaniesWinner;


use App\Domain\ProductsCompaniesWinner\ProductsCompaniesWinner;
use App\Infrastructure\Shared\BaseRepository;

class ProductsCompaniesWinnerRepository extends BaseRepository
{
    protected string $entity = ProductsCompaniesWinner::class;
}