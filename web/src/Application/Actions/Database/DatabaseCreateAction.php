<?php

namespace App\Actions\Database;

use App\Domain\Database\Database;
use App\Domain\Database\Database\DatabaseCreatorMysqlRepository;
use App\Exception\ValidationException;

final class EntityCreator
{
    private $repository;

    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createEntity(Entity $data): int
    {
        $this->validateNewEntity($data);

        $userId = $this->repository->insertEntity($data);

        $this->logger->info(sprintf('User created successfully: %s', $userId));

        return $userId;
    }

    private function validateNewEntity(Entity $data): void
    {
        $errors = [];

        if (empty($data['entityName'])) {
            $errors['entityName'] = 'Input required';
        }

        if ($errors) {
            throw new ValidationException('Please check your input', $errors);
        }
    }
}