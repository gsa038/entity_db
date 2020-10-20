<?php

namespace App\Domain\Entity\Service;

use App\Domain\Entity\Entity;
use App\Domain\Entity\EntityRepository;
use App\Exception\ValidationException;

final class UserCreator
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