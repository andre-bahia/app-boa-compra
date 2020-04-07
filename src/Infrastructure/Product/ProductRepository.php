<?php


namespace App\Infrastructure\Product;


use App\Domain\Product\Product;
use App\Infrastructure\Shared\BaseRepository;

class ProductRepository extends BaseRepository
{
    protected string $entity = Product::class;
}