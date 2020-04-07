<?php


namespace App\Infrastructure\Company;


use App\Domain\Company\Company;
use App\Infrastructure\Shared\BaseRepository;

class CompanyRepository extends BaseRepository
{
    protected string $entity = Company::class;
}