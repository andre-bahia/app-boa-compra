<?php


namespace App\Infrastructure\Shared;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

abstract class BaseRepository
{
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;

    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @var mixed
     */
    protected string $entity;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository($this->entity);
    }

    /**
     * @param $entity
     * @return mixed
     * @throws \Exception
     */
    public function save($entity)
    {
        try {
            $this->entityManager->persist($entity);
            $this->entityManager->flush();
            return $entity;

        } catch (\Throwable $throwable) {
            throw new \Exception($throwable->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        $builder = $this->repository->createQueryBuilder("entity");
        return $builder->getQuery()->getResult();
    }

}